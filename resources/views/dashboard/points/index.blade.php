@extends('layouts.user')

@section('title', 'Всі локації')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Map Location</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 15%">
                                Назва   
                            </th>
                            <th style="width: 20%">
                               Опис
                            </th>
                            <th style="width: 15%">
                                Широта
                            </th>
                            <th style="width: 15%">
                                Довгота
                            </th>
                            <th style="width: 15%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $place)
                            <tr>
                                <td>
                                    {{ $place->title }}
                                </td>
                                <td class="project_progress">
                                    {{ Str::words($place->description, 4, '...') }}
                                </td>
                                 <td>
                                    {{ $place->lat }}
                                </td>
                                 <td>
                                    {{ $place->lng }}
                                </td>
                                <td class="project-actions text-right d-flex">
                                    <a class="btn btn-info btn-sm" href="{{ route('places.edit',$place['id']) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Редагувати
                                    </a>
                                    <form action="{{ route('places.destroy',$place['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm delete-btn" onclick="return confirm('Впевнені, що хочете видалити цю точку?');">
                                            <i class="fas fa-trash"></i>
                                            Видалити
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
         <div class="mt-2">
            {{ $data->links('pagination::bootstrap-4') }}
         </div>
    </section>
@endsection