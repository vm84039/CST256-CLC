

@section('content')
    <div id = "main">
        <div class="table-responsive card profile " >
            <div  data-bs-toggle="collapse">
                <div class="cardHeader">
                    <h1 style="margin:20px" >Affinity Groups</h1>
                </div>
            </div>
            <div class="jumbotron ">
                <a class="btn btn-link" href="addAffinityGroup">
                    {{'Add New Affinity Group'}}
                </a>
                <div class="card scroll">
                    <div class="card-body ">
                        <form action="editAffinityGroup" method="POST">
                            <input type="hidden"  name="edit" value="none">
                            @csrf
                            <table id="datatableid " class='table table-striped table-data job-list' border='1'>
                                <thead>
                                <tr>
                                    <th widthscope="col">ID</th>
                                    <th scope="col">Affinity Name</th>
                                    <th scope="col">Affinity Description</th>
                                    <th scope="col">Image<br>File Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($affinities as $affinity) {
                                ?>
                                <tr >
                                    <td>{{ $affinity->id }}</td>
                                    <td class="name">{{ $affinity->name }}</td>
                                    <td class="name">{{ $affinity->description }}</td>
                                    <td>{{ $affinity->image }}</td>
                                    <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                                 value="{{ $affinity->id}}">Edit</button></td>
                                    <td><button  class="btn btn-primary formButton" type="submit" name="id"
                                                 value="{{ $affinity->id }}" formaction="deleteAffinityGroup">Delete</button></td>
                                </tr>
                                <?php
                                }?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
