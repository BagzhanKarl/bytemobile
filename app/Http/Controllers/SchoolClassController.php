<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Interfaces\SchoolClassInterface;
use App\Interfaces\SchoolSessionInterface;
use App\Http\Requests\SchoolClassStoreRequest;
use App\Traits\SchoolSession;

class SchoolClassController extends Controller
{
    use SchoolSession;
    protected $schoolClassRepository;
    protected $schoolSessionRepository;

    /**
    * Create a new Controller instance
    * 
    * @param SchoolClassInterface $schoolClassRepository
    * @return void
    */
    public function __construct(SchoolSessionInterface $schoolSessionRepository, SchoolClassInterface $schoolClassRepository) {
        $this->middleware(['can:view classes']);

        $this->schoolSessionRepository = $schoolSessionRepository;
        $this->schoolClassRepository = $schoolClassRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $data = $this->schoolClassRepository->getClassesAndSections($current_school_session_id);

        return view('classes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SchoolClassStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Валидация данных
    $validated = $request->validate([
        'class_name' => 'required|string|max:255',
        'session_id' => 'required|integer',
    ]);

    // Сохранение данных
    $class = new SchoolClass();
    $class->class_name = $request->class_name;
    $class->session_id = $request->session_id;
    $class->save();

    // Редирект или ответ
    return redirect()->back()->with('success', 'Группа успешно создана');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $class_id
     * @return \Illuminate\Http\Response
     */
    public function edit($class_id)
    {
        $current_school_session_id = $this->getSchoolCurrentSession();

        $schoolClass = $this->schoolClassRepository->findById($class_id);

        $data = [
            'current_school_session_id' => $current_school_session_id,
            'class_id'                  => $class_id,
            'schoolClass'               => $schoolClass,
        ];
        return view('classes.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $this->schoolClassRepository->update($request);

            return back()->with('status', 'Class edit was successful!');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolClass  $schoolClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $schoolClass)
    {
        //
    }
}
