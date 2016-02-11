<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TaskStoreRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;
use App\User;

class TaskController extends Controller
{
    /**
     * The task model instance.
     *
     * @var Task
     */
    protected $tasks;

    /**
     * The user model instance.
     *
     * @var User
     */
    protected $users;

    /**
     * TaskController constructor.
     * @param Task $tasks
     * @param User $users
     */
    public function __construct(Task $tasks, User $users)
    {
        $this->tasks = $tasks;
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->tasks->all();

        return view('tasks-index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->user_id = $request->user_id;
        $task->save();

        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = $this->tasks->find($id);
        $users = $this->users->all();

        return view('tasks-edit')->with('task', $task)->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TaskStoreRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskStoreRequest $request, $id)
    {
        $input = Input::all();

        $task = $this->tasks->find($id);

        $task->name = $input['name'];
        $task->user_id = $input['user_id'];
        $task->save();

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tasks->findOrFail($id)->delete();

        return redirect('/');
    }
}
