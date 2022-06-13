@extends('user.user_master')
@section('user')

    <div class="container" style="display: flex;
                                                                        width: 900px;
                                                                        height: 85%;
                                                                        background-color: #ffffff;
                                                                      border: 0.5px solid lightgrey;">

        <div class="left">

            <div class="top">
 
                <div class="card">
                </div>

            </div>

            <div class="conversations">
                @foreach ($doctorChat as $doctor)
                    <a class="person" href="{{ route('doctor.chat.index', ['id' => $doctor->doctor_id]) }}">

                        <div class="box">
                            <div class="image">
                                @if ($doctor->avatar != null)
                                    <img src="{{ asset('/upload/user_images/' . $doctor->avatar) }}" height="50px"
                                        width="50px">
                                @else
                                    <img src="{{ asset('upload/noimagejpg.jpg') }}" height="50px" width="50px">
                                @endif

                            </div>
                            <div class="online"></div>
                        </div>

                        <div class="information">
                            <div class="username">{{ $doctor->name }}</div>
                            <div class="content">
                                <div class="message ">{{ $doctor->last_message }} </div>
                                <div class="time"> &bull; {{ $doctor->created_at }}</div>
                            </div>
                        </div>



                    </a>
                @endforeach


            </div>

        </div>

        <div class="right">

            <div class="top">
                @if ($chatWith)
                    <div class="box">

                        <div class="image">
                            @if ($chatWith->profile_photo_path != null)
                                <img src="{{ asset('/upload/user_images/' . $chatWith->profile_photo_path) }}"
                                    height="35px" width="35px">
                            @else
                                <img src="{{ asset('upload/noimagejpg.jpg') }}" height="35px" width="35px">
                            @endif
                        </div>
                        <div class="online"></div>
                    </div>

                    <div class="information">
                        <div class="username"> <a href="">{{ $chatWith->name }}</a>
                        </div>

                    </div>

                    <div class="options">
                        <button class="info">&bull;&bull;&bull;</button>
                    </div>
                @endif
            </div>

            @if ($chatWith)
                <div class="middle">

                    <div class="tumbler">

                        <div class="messages">

                            @foreach ($chat as $message)
                                @if ($message->sender_id == Auth::id())
                                    <div class="clip sent">
                                        <div class="text">{{ $message->message }}</div>
                                    </div>
                                @else
                                    <div class="clip received">
                                        <div class="text">{{ $message->message }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>


                    </div>

                </div>

                <div class="bottom">
                    {!! Form::open(['route' => ['doctor.chat.store'], 'method' => 'post']) !!}
                    {!! Form::hidden('sender_id', Auth::id()) !!}
                    {!! Form::hidden('receiver_id', $chatWith->id) !!}

                    <div class="cup">
                        <textarea id="message" name="message" cols="30" rows="1" placeholder="Message..." required></textarea>
                        {!! Form::submit('Send', ['class' => 'send']) !!}

                    </div>
                    {!! Form::close() !!}

                </div>
            @endif


        </div>


    </div>

@endsection
