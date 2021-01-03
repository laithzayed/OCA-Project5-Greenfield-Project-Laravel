@extends('layout.dashbord_main')

@section('contant')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Category</h3>
                            </div>
                            <hr>
                            <form action="/Category/create" method="post" enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">

                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">job Category</label>
                                        <input id="cc-pament" name="job_cat" type="text" class="form-control">
                                    </div>

                                </div>

                            </div> 
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">image</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" name="image" >
                                <div>{{$errors->first('image')}}</div>
                             </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                    <span id="payment-button-amount">Create</span>
                                </button>
                            </div>
                        

                        </form>
                </div>
            </div>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Show Categories</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>id</th>
                                            <th>Category name</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($categories as $categorie )
                                                <td>{{$categorie->id}}</td>
                                                <td>{{$categorie->job_cat}}</td>
                                          <td><img src="{{asset("uploads/photo/$categorie->image ")}}" alt="image" width='50px' height='50px'  ></td>
                                         <td><a href="/Category/{{$categorie->id}}/edit"  class='btn btn-primary'>Edit</a></td>
                                         <td><a href="/Category/{{$categorie->id}}/delete" class='btn btn-danger'>  Delete</a></td>
                                             </tr>
                                         @endforeach
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
@endsection

