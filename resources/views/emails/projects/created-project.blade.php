<x-mail::message>

# Hi {{ $username }}
 
the project '{{ $project_title }}' was created successfully!
 
<x-mail::button :url="$project_url">
View Project
</x-mail::button>
 
Thanks,<br>
Team {{ config('app.name') }}
</x-mail::message>