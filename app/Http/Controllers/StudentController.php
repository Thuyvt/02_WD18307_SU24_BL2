<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $students = Student::all();
            // C1:
            // return StudentResource::collection($students); // trả ra list collection
            $arr = [
                'status' => true,
                'message' => "Lấy danh sách sinh viên thành công",
                'data' => StudentResource::collection($students)
            ];
            return response()->json($arr, 200);

        } catch (Exception $ex) {
            $arr = [
                'status' => false,
                'message' => "Lỗi kết nối CSDL",
                'description' => $ex->getMessage()
            ];
            return response()->json($arr, $ex->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $student = Student::query()->create($request->all());
        // validate dữ liệu
        $validator = Validator::make($request->all(), [
            'ten' => ['required', 'max:50', 'string'],
            'email' => ['required', 'email'],
        ]);
        // Nếu validate lỗi
        if ($validator->fails()) {
            $res = [
                'status' => false,
                'message' => "Lỗi kiểm tra dữ liệu",
                'description' => $validator->errors()
            ];
            return response()->json($res, 200);
        }
        $student = Student::query()->create([
            'name' => $request->ten,
            'major_id' => $request->maNganh,
            'email' => $request->email,
            'dob' => $request->ngaySinh,
        ]);
        $res = [
            'status' => true,
            'message' => "Tạo mới thành công",
            'data' => new StudentResource($student)
        ];
        return response()->json($res, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::query()->where('id', $id)->first();
        if (!$student) {
            $res = [
                'status' => false,
                'message' => 'Không có sinh viên này'
            ];
            return response()->json($res, 404);
        }
        $res = [
            'status' => true,
            'message' => 'Chi tiết sinh viên',
            'data' => new StudentResource($student)
        ];
        return response()->json($res, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = Student::query()->where('id', $id)->first();
        if (!$student) {
            $res = [
                'status' => false,
                'message' => 'Không có sinh viên này'
            ];
            return response()->json($res, 404);
        }
        // validate dữ liệu
        $validator = Validator::make($request->all(), [
            'ten' => ['required', 'max:50', 'string'],
            'email' => ['required', 'email'],
        ]);
        // Nếu validate lỗi
        if ($validator->fails()) {
            $res = [
                'status' => false,
                'message' => "Lỗi kiểm tra dữ liệu",
                'description' => $validator->errors()
            ];
            return response()->json($res, 200);
        }
        // C1:
        $student->update([
            'name' => $request->ten,
            'major_id' => $request->maNganh,
            'email' => $request->email,
            'dob' => $request->ngaySinh,
        ]);
        // C2
//        $student->name = $request->ten;
//        $student->major_id = $request->maNganh;
//        $student->email = $request->email;
//        $student->dob = $request->ngaySinh;
//        $student->save();
        $res = [
            'status' => true,
            'message' => 'Sản phẩm cập nhật thành công',
            'data' => new StudentResource($student)
        ];
        return response()->json($res, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::query()->where('id', $id)->first();
        if (!$student) {
            $res = [
                'status' => false,
                'message' => 'Không có sinh viên này'
            ];
            return response()->json($res, 404);
        }
        // xóa student
        $student->delete();
        $res = [
            'status' => true,
            'message' => 'Xóa thành công'
        ];
        return response()->json($res, 200);
    }
}
