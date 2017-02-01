@extends('all-section.faculty.index')



@section('content')

    <div class="container">

        <div style="margin-top: 5em">

            <a href="{{Route('subject.create')}}" class="btn btn-primary pull-right"><span style="margin-right: 1em"><i class="fa fa-plus" aria-hidden="true"></i></span>Add Subject</a>

        </div>



        <div style="margin-top:10em" >

            <table class="table table-hover table-striped table-responsive" >

                <tr>

                    <th>Id</th>
                    <th>Subject Name</th>
                    <th>semester</th>
                    <th>Faculty Name</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>


                @foreach($subject as $subject)

                <tr>
                    <td>{{$subject->id}}</td>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->semester}}</td>
                    <td>

                        @foreach($subject->users()->get() as $user)
                                {{ $user->name }}
                        @endforeach

                    </td>

                    <td><a class="btn btn-primary" href="{{Route('subject.edit',['id'=>$subject->id])}}">Edit</a></td>
                    <td>
                        <form action="{{Route('subject.destroy',['id'=>$subject->id])}}" method="post">

                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <input type="submit" class="btn btn-danger" value="Delete">

                        </form>
                    </td>

                </tr>

                @endforeach

            </table>

        </div>

    </div>



@stop