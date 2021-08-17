@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2 class="mt-4">Page 1</h2>
        </div>
        <div class="col-4 offset-4 mb-3">
            <label for="layout">Layouts</label>
            <select name="" class="form-control">
                <option value="master">Master</option>
                <option value="app">App</option>
            </select>
        </div>

        <div class="col-8">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="w-100">
                        <div class="card">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis illum inventore modi
                                nesciunt nisi non quam quisquam saepe soluta!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class=" w-100">
                        <div class="card">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis illum inventore modi
                                nesciunt nisi non quam quisquam saepe soluta!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3">
                    <div class=" w-100">
                        <div class="card">
                            <div class="card-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis illum inventore modi
                                nesciunt nisi non quam quisquam saepe soluta!
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="cms-box w-100">
                        <a href="javascript:void(0);" class="justify-content-center " data-toggle="modal"
                           data-target="#exampleModal">Add section</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">

            <div class="col-12 mb-3">
                <label for="layout">Title</label>
                <input type="text" class="form-control" placeholder="Title">
            </div>
            <div class="col-12 mb-3">
                <label for="layout">Seo title</label>
                <input type="text" class="form-control" placeholder="seo-title" disabled>
            </div>
            <div class="col-12 mb-3">
                <label for="layout">Keywords</label>
                <input type="text" class="form-control" placeholder="key,words,cms">
            </div>
        </div>
    </div>

@endsection

@section('modal')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Section</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    test
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .cms-box {
            border: 3px dotted #333;
            padding: 0.5em;
            text-align: center;
        }

        .cms-box:hover {
            border: 3px dotted #333;
            background: #bed7c7;
        }

        /*.cms-box:hover a {*/
        /*    border: 3px dotted #444;*/
        /*}*/

        .cms-box a {
            text-align: center;
            text-decoration: none;
        }

        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }
    </style>
@endpush
