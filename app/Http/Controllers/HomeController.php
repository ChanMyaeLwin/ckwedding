<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use App\Models\Document;
use App\Models\Supplier;
use App\Models\BranchUser;
use Illuminate\Http\Request;
use App\Models\DocumentStatus;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    protected function connection()
    {
        return new Document();
    }
    public function welcome(Request $request)
    {
        $username = '';
        return view('welcome', compact('username'));
    }

    public function welcomewithusername($username)
    {
        return view('welcome', compact('username'));
    }
    public function index()
    {
        try {
            $totalUser = User::whereHas('roles', function ($query) {
                $query->where('name', '!=', 'Admin');
            })->count();
            $totalSupplier = Supplier::count();
            $totalBranch = Branch::count();
            $branches = BranchUser::where('user_id', auth()->user()->id)->with('branches')->get();
            $totalReturnDoc = $this->getTotalReturnDocument();
            $totalExchangeDoc = $this->getTotalExchangeDocument();

            $completeReturnDoc = $this->getCompleteReturnDocument();
            $completeExchangeDoc = $this->getCompleteExchangeDocument();
            $overdueExchangeDoc = $this->getOverdueExchangeDocument();
             // if(count($document_checks) != 0){
            //     foreach ($document_checks as $document_check) {
            //         $document = new DocumentController;
            //         $return_document_doc_no = $document::generate_doc_no(1,date('Y-m-d H:i:s'));
            //         Document::where('id', $document_check->id)->update([
            //             'document_no' => $return_document_doc_no, 
            //             'document_type' =>  1,
            //             'exchange_to_return' =>  date('Y-m-d H:i:s'),
            //             ]
            //         );
            //     }
            // }
            $totalRole = Role::count();
            return view('home', compact('totalUser', 'totalSupplier', 'totalBranch', 'branches', 'totalReturnDoc', 'totalExchangeDoc', 'completeReturnDoc', 'completeExchangeDoc', 'overdueExchangeDoc', 'totalRole'));
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()
                ->intended(route("home"))
                ->with('error', 'Fail to View Home!');
        }
    }

    public function getTotalReturnDocument()
    {
        try {
            $user_branches = BranchUser::where('user_id', auth()->user()->id)->pluck('branch_id')->toArray();
            $document = $this->connection()->whereIn('branch_id', $user_branches);
            return $document->where('document_type', '1')->count();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()
                ->intended(route("home"))
                ->with('error', 'Fail to get Total Return Document!');
        }
    }

    public function getTotalExchangeDocument()
    {
        try {
            $user_branches = BranchUser::where('user_id', auth()->user()->id)->pluck('branch_id')->toArray();
            $document = $this->connection()->whereIn('branch_id', $user_branches);
            return $document->where('document_type', '2')->count();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()
                ->intended(route("home"))
                ->with('error', 'Fail to get Total Exchange Document!');
        }
    }

    public function getCompleteReturnDocument()
    {

        try {
            $user_branches = BranchUser::where('user_id', auth()->user()->id)->pluck('branch_id')->toArray();
            $document = $this->connection()->whereIn('branch_id', $user_branches);
            return $document->where('document_type', '1')->where('document_status', 9)->count();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()
                ->intended(route("home"))
                ->with('error', 'Fail to get Complete Return Document!');
        }
    }

    public function getCompleteExchangeDocument()
    {
        try {
            $user_branches = BranchUser::where('user_id', auth()->user()->id)->pluck('branch_id')->toArray();
            $document = $this->connection()->whereIn('branch_id', $user_branches);
            return $document->where('document_type', '2')->where('document_status', 11)->count();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()
                ->intended(route("home"))
                ->with('error', 'Fail to get Complete Exchange Document!');
        }
    }

    public function getOverdueExchangeDocument()
    {
        try {
            $user_branches = BranchUser::where('user_id', auth()->user()->id)->pluck('branch_id')->toArray();
            $document = $this->connection()->whereIn('branch_id', $user_branches);
            $inetrval = date('Y-m-d', strtotime(now() . ' - 14 days'));
            return $document->where('document_type', '=', '2')->where('deleted_at', null)
            ->where('operation_rg_in_updated_datetime', null)->where('operation_rg_out_updated_datetime', '<', $inetrval)->count();
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            return redirect()
                ->intended(route("home"))
                ->with('error', 'Fail to get Complete Exchange Document!');
        }
    }
    public function make_as_read($notification_id,$document_id)
    {
        $notification = auth()->user()->notifications()->find($notification_id);
        if($notification) {
            $notification->markAsRead();
        }
        return redirect()
                ->intended(route("documents.edit",$document_id));
        
    }

    public function notifications()
    {
        return number_convert(auth()->user()->unreadNotifications->count());
    }
}
