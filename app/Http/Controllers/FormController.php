<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use App\Rules\UppercaseRule;
use App\Rules\LowercaseRule;
use App\Rules\StudentCodeRule;
use App\Rules\MobilePhoneRule;
use App\Rules\LanguageEnglishRule;
use App\Rules\LanguageThaiRule;
use App\Rules\EmailPublicRule;
use App\Rules\EmailPrivateRule;
use App\Rules\StrongPasswordRule;
use App\Rules\RepeatPasswordRule;

class FormController extends Controller
{
    public function index()
    {
        // $obj = DB::table('schedule')->first();
        // return $obj->name;
        // return view('index');
        // Read - Display a list of items
    }
    public function create()
    {
        return view('form');
    }
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'uppercase' => ['required', 'string', new UppercaseRule],
            'lowercase' => ['required', 'string', new LowercaseRule],
            'student_code' => ['required', 'string', new StudentCodeRule],
            'mobile_phone' => ['required', 'string', new MobilePhoneRule],
            'lang_eng' => ['required', 'string', new LanguageEnglishRule],
            'lang_thai' => ['required', 'string', new LanguageThaiRule],
            'email_public' => ['required', 'string', new EmailPublicRule],
            'email_private' => ['required', 'string', new EmailPrivateRule],
            'password' => ['required', 'string', new StrongPasswordRule],
            'repeat_password' => ['required', 'string', new RepeatPasswordRule($request->password)],
        ]);

        return redirect()->back()->with('success', 'Form submitted successfully!');

        // var_dump($validated_data);

        /* try {
            // Save to database
            $data = Form::create($validate_uppercase);

            // Success message or any further processing...
            echo "Data saved successfully!";
        } catch (\Exception $e) {
            // If there's an error, handle it
            var_dump($e->getMessage()); // or any other error handling mechanism
        } */

        /* $data = [
            'Q28.1' => $request->checkbox1,
            'Q28.2' => $request->checkbox2
        ];
        try {

            DB::table('form')->insert([
                'email' => $request->email,
                'password' => $request->password,
                'address' => json_encode($data),
            ]);

            return response()->json(['status' => True, 'message' => 'Insert data success']);

        } catch (\Exception $e) {
            return $e;
            // return response()->json(['status' => False, 'message' => 'Insert data failed']);
        } */
    }
    public function show($id)
    {
        // Read - Display a single item
    }
    public function edit($id)
    {
        // Update - Show the form to edit an item
    }
    public function update(Request $request, $id)
    {
        // Update - Save the edited item to the database
    }
    public function destroy($id)
    {
        // Delete - Remove an item from the database
    }
}
