<div class="container">
    <div class="px-5">
        <br>
        <h3>Find Jobs</h3>
        @foreach($jobPost as $jobPosts)
        <div class="card mb-4">
            <div class="card-header">
                <p style="font-size: 10px;">Posted {{ \Carbon\Carbon::parse($jobPosts->created_at)->diffForHumans() }}</p>
                <h5>{{$jobPosts->title}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{$jobPosts->description}}</p>
                <p class="card-text">Duration: {{$jobPosts->deadline}}</p>
                <p class="card-text">Budget: Rs. {{$jobPosts->budget}}</p>
                <p class="card-text">Tech Stack: {{$jobPosts->skills}}</p>
                <a href="{{ url('/edit/' . $jobPosts->id) }}" class="btn btn-primary">edit</a>
                <a href="/proposal" class="btn btn-primary">delete</a>
            </div>
        </div>
        @endforeach
    </div>
</div>