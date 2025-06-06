<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Category;
use Symfony\Component\HttpFoundation\StreamedResponse;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        //$user = Auth::user();
        $query = Contact::with('category')            
            ->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category_id)
            ->ContactDateSearch($request->date);

        
        $contacts = $query->paginate(7)->appends($request->all());
        $categories = Category::all();
                

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function export(Request $request): StreamedResponse
    {
        $keyword = $request->input('keyword');
        $gender = $request->input('gender');
        $categoryId = $request->input('category_id');
        $date = $request->input('date');
        
        $query = Contact::query();

        if(!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
        });
        }

        if(!empty($gender)) {
        $query->where('gender', $gender);
        }

         if(!empty($categoryId)) {
        $query->where('category_id', $categoryId);
         }

        if(!empty($date)) {
        $query->whereDate('created_at', $date);
        }

        $contacts = $query->get();

        $headers = ['お名前', 
                    '性別', 
                    'メールアドレス', 
                    '電話番号', 
                    '住所', 
                    '建物名', 
                    'お問い合わせ日時',
                    'お問い合わせの種類',
                    'お問い合わせ内容'
                ];

        $response = new StreamedResponse(function () use ($contacts, $headers) {
            $handle = fopen('php://output', 'w');
            stream_filter_prepend($handle, 'convert.iconv.utf-8/cp932');
            fputcsv($handle, $headers);

            foreach($contacts as $contact) {
                fputcsv($handle, [
                    $contact->last_name . ' ' . $contact->first_name,
                    ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender],
                    $contact->email,
                    $contact->tel,
                    $contact->address,
                    $contact->building,
                    $contact->created_at,
                    $contact->category->content,
                    $contact->detail,                    
                ]);
            }

            fclose($handle);
        });

        $filename = 'contacts_' . now()->format('Ymd_His') . '.csv';
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="'.$filename.'"');
    
        return $response;
    }



}