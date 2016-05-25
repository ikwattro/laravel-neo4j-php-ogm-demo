<div class="actor-info">
    <h1>{{ $actor->getName() }}</h1>
    <p>Year of birth : {{ $actor->getBorn() }}</p>
    <br />
    <h3>Filmography</h3>
    <ul class="list-unstyled">
        @foreach($actor->getActs() as $role)
            <li><a href="/movie/{{$role->getMovie()->getId()}}">{{ $role->getMovie()->getTitle() }}</a> as "{{ implode(', ', $role->getRoles()) }}"</li>
        @endforeach
    </ul>
    <br />
</div>