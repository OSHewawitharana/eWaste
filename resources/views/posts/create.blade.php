@include('layouts.main')

@yield('body')








   <div class="container">
   
            <!--Panel-->
            <div class="card  text-center" >
                <div class="card-header black white-text">
                <h1>
                   Add a Posts
                   </h1>
                </div>
                <div class="card-body">

                   @include('partials.messages')

                    <form class="form-horizontal" method="POST" action="{{ route('posts.store') }}"  enctype="multipart/form-data">
                        {{ csrf_field() }}



                        {{--type--}}
                        <div class="form-group form-inline">
                           
                                    <label for="category" >Category</label>
                                    <select class="form-control" name="category" placeholder="<select>" >
        
                                    <option placeholder="<select>" disabled selected >select</option>

                                    @foreach($cat as $category)
                                    <option value="{{ $category->category}}" name="category">{{ $category->category }}</option>
                                    
                                    @endforeach                                    
                                    </select>
                             
                        </div>

                        {{-- topic--}}
                        <div class="form-group form-inline">
                            
                                    <label for="topic"  >Title</label>
                               
                                    <input id="topic" class="form-control" type="text" name="title" required >
                             
                        </div>
                        {{-- desc --}}
                        <div class="form-group form-inline">
                          
                                    <label for="description" >Description</label>
                              
                                    <input id="description" class="form-control" type="text" name="description" required>
                             
                        </div>
                        <div class="form-group  form-inline ">
                        <label for="attachment" >Attachment</label>
                              <div class="dropify">
                        <input id="dropify" class="form-control " type="file" name="attachment">
                        </div>
                        </div>

                        <br>
                        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-elegant waves-effect btn-sm" name="submit">
                                        submit
                                    </button>
                               
                        </div>
                    </form>
                </div>
            </div>
            <br><br>
            <!--/.Panel-->
       