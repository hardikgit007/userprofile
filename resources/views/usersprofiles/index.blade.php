@extends('userprofiles.layout')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>userprofile Data</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('userprofiles.create') }}"> Create New userprofile</a>

            </div>

        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif



    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Email</th>

            <th>Phone</th>

            <th>Address</th>

            <th>Profile Image</th>
            <th width="280px">Action</th>

        </tr>

        @foreach ($userprofiles as $userprofile)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $userprofile->name }}</td>

            <td>{{ $userprofile->email }}</td>

            <td>{{ $userprofile->address }}</td>


            <td>

                    @csrf

                    @method('DELETE')



                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>



    {!! $userprofiles->links() !!}



@endsection
