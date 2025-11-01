<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        if ($students->isEmpty()) {
            return response()->json(['message' => 'No records available'], 200);
        }

        return StudentResource::collection($students);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string|max:255',
            'age' => 'required|integer',
            'address' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->messages(),
            ], 422);
        }

        $student = Student::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'age' => $request->age,
            'address' => $request->address,
        ]);

        return response()->json([
            'message' => 'Student created successfully',
            'data' => new StudentResource($student)
        ], 200);
    }

      public function show(Student $student){
                
          return  new StudentResource($student);
                 if ($students->isEmpty()) {
            return response()->json(['message' => 'No records available'], 200);
        }
      }
      public function update(Request $request , Student $student)
      {
          $validator = Validator::make($request->all(), [
              'fullname' => 'sometimes|required|string|max:255',
                   'email' => [
                  'sometimes',
                  'required',
                  'email',
                  Rule::unique('students', 'email')->ignore($student->id),
              ],
              'phone' => 'sometimes|required|string|max:255',
              'age' => 'sometimes|required|integer',
              'address' => 'sometimes|required|string|max:255',
          ]);

          if ($validator->fails()) {
              return response()->json([
                  'message' => 'Validation failed',
                  'errors' => $validator->messages(),
              ], 422);
          }

          $updateData = $request->only(['fullname', 'email', 'phone', 'age', 'address']);

          $student->update($updateData);

          return response()->json([
              'message' => 'Student updated successfully',
              'data' => new StudentResource($student)
          ], 200);
      }

      public function destroy($id)
      {
          $student = Student::find($id);

          if (!$student) {
              return response()->json(['message' => 'Student not found'], 404);
          }

          $student->delete();

          return response()->json([
              'message' => 'Student deleted successfully'
          ], 200);
      }
}
