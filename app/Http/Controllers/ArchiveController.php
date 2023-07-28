<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ArchiveCallRepositoryInterface;

class ArchiveController extends Controller
{
    private $archiveCallRepository;

    public function __construct(ArchiveCallRepositoryInterface $archiveCallRepository)
    {
        $this->archiveCallRepository = $archiveCallRepository;
    }

    public function index()
    {
        return view('archives.list');
    }

    public function getList()
    {
        return response()->json($this->archiveCallRepository->getAll()->toArray(), 200);
    }
}
