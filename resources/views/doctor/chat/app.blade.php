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
                        <p><label for="file" style="padding-top: 10px; font-size:10px;cursor: pointer;"> Attach Image</label></p>
                    </div>
                @endif
            </div>

            @if ($chatWith)
                <div class="middle">

                    <div class="tumbler">

                        <div class="messages">

                            @foreach ($chat as $message)
                                @if ($message->sender_id == Auth::id())
                                    @if($message->has_content)
                                        <div class="clip sent">
                                            @if($message->has_attach)
                                                <a href="{{$message->attach_url}}" target="_blank"> <img width="200" src="{{$message->attach_url}}"> </a>
                                            @endif
                                            @if($message->has_message)
                                                <div class="text">{{ $message->message }}</div>
                                            @endif
                                        </div>
                                    @endif

                                @else
                                    @if($message->has_content)
                                        <div class="clip received">
                                            @if($message->has_attach)
                                                <a href="{{$message->attach_url}}" target="_blank"><img width="200" src="{{$message->attach_url}}"></a>
                                            @endif
                                            @if($message->has_message)
                                                <div class="text">{{ $message->message }}</div>
                                            @endif
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>


                    </div>

                </div>

                <div class="bottom">
                    {!! Form::open(['route' => ['doctor.chat.store'], 'method' => 'post' ,'files' => true]) !!}
                    {!! Form::hidden('sender_id', Auth::id()) !!}
                    {!! Form::hidden('receiver_id', $chatWith->id) !!}

                    <div class="cup">
                        <div class="attach-image">
                            <p id="removeFile" style="cursor: pointer; position:absolute;display: none" onclick="unLoadFile(event)">x</p>
                            <p><img id="output" style="display: none" width="200" /></p>
                        </div>

                        <textarea id="message" name="message" cols="30" rows="1" placeholder="Message..." ></textarea>
                        {!! Form::submit('Send', ['class' => 'send']) !!}
                        <p><input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>

                    </div>
                    {!! Form::close() !!}

                </div>
            @endif


        </div>


    </div>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.style = 'display:block;';
            image.src = URL.createObjectURL(event.target.files[0]);
            document.getElementById("removeFile").style = 'display:block;cursor: pointer; position:absolute;';

        };
        var unLoadFile = function(event) {
            var image = document.getElementById('output');
            image.style = 'display:none;';
            image.src = '';
            document.getElementById("file").value = "";
            document.getElementById("removeFile").style = 'display:none;';

        };
    </script>

@endsection
