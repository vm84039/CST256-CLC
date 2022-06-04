@section('content')
    <div id = "main">
        <div class="card shadow mb-3 profile">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"> Affinity Groups </p>
            </div>
            <div class="card-body  scroll" >
                <form method="POST" action="joinAffinity">
                    @csrf
                    @foreach($affinities as $affinity )
                    <div class="container"   >
                        <div class="photo-card affinity">
                            <div class="photo-background" style="background-image:url('assets/img/affinity/{{$affinity->image}}');"></div>
                            <div class="photo-details">
                                <p class="photo-header">{{$affinity->name}} <br>Affinity Group</p>
                                <p class ="photo-desc">{{$affinity->description}}&nbsp; </p>
                                <div class="photo-tags photo-button-position">
                                    <ul>

                                        @if($AffinityDao->isAffinityMember($affinity->id, Auth::id()))
                                        <li style="margin-top: 50px" ><button style="margin: 20px 0px 20px 0px;float: left;" class="btn btn-primary btn-lg" id="submitBtn" formaction="removeAffinity"  name="affinityId" type="submit" value="{{$affinity->id}}">Remove</button></li>
                                        @else
                                        <li style="margin-top: 50px" ><button style="margin: 20px; float: left;" class="btn btn-primary btn-lg" id="submitBtn" name="affinityId" type="submit" value="{{$affinity->id}}">Join</button></li>
                                        @endif
                                        <li style=" margin-top: 50px"><button style="margin: 20px;" class="btn btn-primary btn-lg" id="submitBtn" name="affinityId" formaction="memberList" value="{{$affinity->id}}" type="submit">Members</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@stop
