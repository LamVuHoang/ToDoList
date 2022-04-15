<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToDoList;
use App\Http\Requests\UpdateTodoListRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $not_done = Todo::where('completed', 0)
            ->orderBy('deadline', 'asc')->paginate(5, ['*'], 'not_done');
        $done = Todo::where('completed', 1)->paginate(8, ['*'], 'done');
        return view('List.ListAll', [
            'not_done' => $not_done,
            'done' => $done,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $work = Todo::where('id', $id)->first();

        return view('List.Detail', [
            'work' => $work,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('List.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreToDoList $request)
    {
        $request->validated();

        $activity = new Todo();
        $activity->subject = $request->subject;
        $activity->deadline = $request->deadline;
        if ($request->has('detail')) {
            $activity->detail = $request->detail;
        }
        if ($request->completed) $activity->completed = 1;
        else $activity->completed = 0;

        $result = $activity->save();
        if ($result == 1) {
            return redirect()->back()->with('alert', '<div class="alert alert-success">Cập nhật Sản phẩm thành công</div>');
        } else {
            return redirect()->back()->with('alert', '<div class="alert alert-danger">Cập nhật Sản phẩm thất bại</div>');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $activity = Todo::where('id', $id)->first();

        return view('List.Update', [
            'activity' => $activity,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodoListRequest $request, int $id)
    {
        $request->validated();

        $activity = Todo::find($id);
        if ($request->has('subject')) {
            $activity->subject = $request->subject;
        }
        if ($request->has('deadnine')) {
            $activity->deadline = $request->deadline;
        }
        if ($request->has('detail')) {
            $activity->detail = $request->detail;
        }
        if ($request->completed) $activity->completed = 1;
        else $activity->completed = 0;

        $result = $activity->save();
        if ($result == 1) {
            return redirect()->back()->with('alert', '<div class="alert alert-success">Update Activity Successfully</div>');
        } else {
            return redirect()->back()->with('alert', '<div class="alert alert-danger">Failed to Update Activity</div>');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $destroyed = Todo::find($id);
        $subject = $destroyed->subject;
        $destroyed->delete();

        return redirect()->back()->with('message', "$subject had been deleted");
    }
}
