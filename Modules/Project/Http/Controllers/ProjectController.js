// <?php

// namespace Modules\Project\Http\Controllers;


// use Illuminate\Routing\Controller;

// use Modules\Project\Http\Services\ProjectService;

// use Modules\Project\Http\Requests\CreateProjectRequest;
// use Modules\Project\Http\Requests\UpdateProjectRequest;
// use Modules\Project\Http\Requests\DeleteProjectRequest;
// use Modules\Project\Http\Resources\ProjectResource;

// class ProjectController extends Controller
// {
//     public $service;

//     public function __construct(ProjectService $service)
//     {
//         $this->service = $service;
//     }

//     /**
//      * Display a listing of the resource.
//      * @return Response
//      */
//     public function index()
//     {
//         return $this->service->index();
//     }

//     /**
//      * Show the form for creating a new resource.
//      * @return Response
//      */
//     public function create()
//     {
//         return view('project::create');
//     }

//     /**
//      * Store a newly created resource in storage.
//      * @param  Request $request
//      * @return Response
//      */
//     public function store(Request $request)
//     {
//     }

//     /**
//      * Show the specified resource.
//      * @return Response
//      */
//     public function show()
//     {
//         return view('project::show');
//     }

//     /**
//      * Show the form for editing the specified resource.
//      * @return Response
//      */
//     public function edit()
//     {
//         return view('project::edit');
//     }

//     /**
//      * Update the specified resource in storage.
//      * @param  UpdateProjectRequest $request
//      * @return Response
//      */
//     public function update(UpdateProjectRequest $request)
//     {
//         return $this->service->update($request->all());
//     }

//     /**
//      * Remove the specified resource from storage.
//      * @return Response
//      */
//     public function destroy(DeleteProjectRequest $request)
//     {
//         return $this->service->delete($request['id']);
//     }
// }
