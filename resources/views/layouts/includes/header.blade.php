<header class="p-3 bg-dark text-white">
        <div class="row">
            <div class="col">
                <h3>{{$title}}</h3>
            </div>
            <div class="col">
                
            @if(Auth::check())
    <span>Welcome, {{ Auth::user()->name }}</span>
@endif
          
            </div>
            <div class="col">
                <div class="d-flex justify-content-center gap-3">
                    
                    <a class="text-light text-decoration-none" href="{{route('taskList')}}">Task List</a>
                </div>
            </div>
            <div class="col">
                <div class="d-flex justify-content-center gap-3">
                    
                    <a class="text-light text-decoration-none" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </header>
    
    