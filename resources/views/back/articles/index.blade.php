@extends('back._layouts.master')

@section('pageTitle', fragment('back.articles.title'))

@section('content')
<section>
    <div class="grid">
        <h1>{{ fragment('back.articles.title') }}</h1>
        <a href="{{ action('Back\ArticleController@create') }}" class="button">{{ fragment('back.articles.new') }}</a>

        <table data-datatable data-order='[[ 0, "asc" ]]'>
            <thead>
            <tr>
                <th>{{ fragment('back.articles.name') }}</th>
                <th data-orderable="false"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($articles as $article)
                <tr data-row-id="{{ $article->id }}">
                    <td>
                        <a href="{{ action('Back\ArticleController@edit', [$article->id]) }}">{{ $article->translate(content_locale())->name }}</a>
                    </td>
                    <td class="-right">
                        @if($article->isDeletable())
                            {!! HTML::formButton(action('Back\ArticleController@destroy', [$article->id]), '<span class="fa fa-remove"></span>', 'delete',
                                [
                                    'class'=>'button -danger -small',
                                    'id'=> 'delete_article_' . $article->id
                                ]
                            )!!}
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


    </div>
</section>
@stop
