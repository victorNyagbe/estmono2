@extends('admin.layouts.admin')

@section('style')
    <link rel="stylesheet" href="{{ asset('styles/admin/project-types/show.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $project_type->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.project-type.index') }}">Types de projet</a></li>
                            <li class="breadcrumb-item active">{{ $project_type->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                @include('admin.includes.messageReturned')

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="table-responsive table-responsive-md text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th width="100">Image</th>
                                        <th>Titre</th>
                                        <th width="300">Description</th>
                                        <th width="200">Postée le</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($project_type->projects()->latest()->get() as $project)
                                        <tr class="text-center">
                                            <td><div class="project-image" style="background-image: url('{{ asset('storage/app/public/' . $project->image) }}')"></div></td>
                                            <td title="{{ $project->title }}">{{ \Illuminate\Support\Str::substr($project->title, 0, 50) . '...' }}</td>
                                            <td title="{{ $project->subtitle }}">{{ \Illuminate\Support\Str::substr($project->subtitle, 0, 50) . '...' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($project->created_at)->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.projects.destroy', $project) }}" onclick="return confirm('Êtes-vous certain de vouloir supprimer ce projet ? Cette action est irréversible.');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="5">Aucun projet n'a été enregistré dans ce type</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

@endsection
