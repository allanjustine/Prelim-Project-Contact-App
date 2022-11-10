{{-- Modal post Features --}}
<div class="modal fade" id="click" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="modall">
        <div class="modal-header text-center">
            <h5 class="modal-title text-white" id="exampleModalLabel">Create post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <select name="title" class="form-select" wire:model.defer="title">
            <option hidden="true">Reason of posting?</option>
            <option selected disabled>Reason of posting?</option>
            <option value="">None</option>
            <option value="Feeling Sick">Feeling Sick</option>
            <option value="Feeling Sad">Feeling Sad</option>
            <option value="Feeling Emotional">Feeling Emotional</option>
            <option value="Feeling Broken">Feeling Broken</option>
            <option value="Feeling Happy">Feeling Happy</option>
            <option value="Feeling Cute">Feeling Cute</option>
            <option value="Feeling Loved">Feeling Loved</option>
            <option value="Feeling Thankful">Feeling Thankful</option>
            <option value="Feeling Angry">Feeling Angry</option>
            <option value="Feeling Crazy">Feeling Crazy</option>
            <option value="Feeling Hopeful">Feeling Hopeful</option>
            <option value="Feeling Proud">Feeling Proud</option>
            <option value="Feeling Fresh">Feeling Fresh</option>
            <option value="Feeling Blessed">Feeling Blessed</option>
            <option value="Feeling Bad">Feeling Bad</option>
            <option value="Feeling Rich">Feeling Rich</option>
            <option value="Feeling Betrayed">Feeling Betrayed</option>
            <option value="Feeling Sleepy">Feeling Sleepy</option>
            <option value="Feeling Nervous">Feeling Nervous</option>
            <option value="Feeling Uncomfortable">Feeling Uncomfortable</option>
            <option value="Feeling Cold">Feeling Cold</option>
            <option value="Feeling Lol">Feeling Lol</option>
            <option value="Feeling In love">Feeling In love</option>
            <option value="Feeling Incomplete">Feeling Incomplete</option>
            <option value="Feeling Cool">Feeling Cool</option>
            <option value="Feeling Wow">Feeling Wow</option>
            <option value="Feeling Cry">Feeling Cry</option>
            <option value="Feeling Explode">Feeling Explode</option>
            <option value="Feeling Disguise">Feeling Disguise</option>
        </select>
        <div class="modal-body">
            <textarea name="content" id="text-area" cols="60" rows="5" placeholder="Express your feelings" wire:model.defer="content"></textarea>
        </div>
        <div class="modal-footer">
                <button type="button" id="submit-button" class="btn btn-secondary form-control" wire:click="addPost()">Post</button>
        </div>
      </div>
    </div>
</div>
{{-- Modal edit feature --}}
<div class="modal fade" id="click-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" id="modall">
        <div class="modal-header text-center">
            <h5 class="modal-title text-white" id="exampleModalLabel">Edit your post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <select name="title" class="form-select" wire:model="title">
            <option hidden="true">Reason of posting?</option>
            <option selected disabled>Reason of posting?</option>
            <option value="">None</option>
            <option value="Feeling Sick">Feeling Sick</option>
            <option value="Feeling Sad">Feeling Sad</option>
            <option value="Feeling Emotional">Feeling Emotional</option>
            <option value="Feeling Broken">Feeling Broken</option>
            <option value="Feeling Happy">Feeling Happy</option>
            <option value="Feeling Cute">Feeling Cute</option>
            <option value="Feeling Loved">Feeling Loved</option>
            <option value="Feeling Thankful">Feeling Thankful</option>
            <option value="Feeling Angry">Feeling Angry</option>
            <option value="Feeling Crazy">Feeling Crazy</option>
            <option value="Feeling Hopeful">Feeling Hopeful</option>
            <option value="Feeling Proud">Feeling Proud</option>
            <option value="Feeling Fresh">Feeling Fresh</option>
            <option value="Feeling Blessed">Feeling Blessed</option>
            <option value="Feeling Bad">Feeling Bad</option>
            <option value="Feeling Rich">Feeling Rich</option>
            <option value="Feeling Betrayed">Feeling Betrayed</option>
            <option value="Feeling Sleepy">Feeling Sleepy</option>
            <option value="Feeling Nervous">Feeling Nervous</option>
            <option value="Feeling Uncomfortable">Feeling Uncomfortable</option>
            <option value="Feeling Cold">Feeling Cold</option>
            <option value="Feeling Lol">Feeling Lol</option>
            <option value="Feeling In love">Feeling In love</option>
            <option value="Feeling Incomplete">Feeling Incomplete</option>
            <option value="Feeling Cool">Feeling Cool</option>
            <option value="Feeling Wow">Feeling Wow</option>
            <option value="Feeling Cry">Feeling Cry</option>
            <option value="Feeling Explode">Feeling Explode</option>
            <option value="Feeling Disguise">Feeling Disguise</option>
        </select>
        <div class="modal-body">
            <textarea name="" id="text-area" cols="60" rows="5" placeholder="Edit your post" wire:model="content"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary form-control" wire:click="updatePost()">Update Post</button>
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="profile">
        <h2 class="mt-3" style="font-family: Comic Sans MS">{{Auth::user()->name}} Profile</h2>
    </div>
    <div class="post-body">
        <div class="col-md-6 offset-3 mt-5" style="width: 560px">
            <div class="card shadow-md p-3" id="write">
                <input type="text" placeholder="Write a post" class="write-2 form-control" data-toggle="modal" data-target="#click" wire:model="content">
            </div>
        </div>
        <hr>
        <div class="col-md-6 mt-4 offset-3">
            @if (session('message'))
                <div id="messagee" class="alert text-black text-center text-black">{{ session('message') }}</div>
            @endif
            @foreach ($posts as $post)
            <div class="card shadow-md mt-3" id="cardd" style="width: 560px">
                <div class="card-header">
                    @if($post->isEditable())
                    <span id="dot-icon" class="float-end dropdown dropstart">
                        <span class="fa-solid fa-ellipsis-vertical text-black" type="button" data-bs-toggle="dropdown" aria-expanded="false"></span>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" wire:click="deletePost()">Delete</a></li>
                            <li><a class="dropdown-item" data-toggle="modal" data-target="#click-edit" wire:click="editPost({{ $post->id }})">Edit</a></li>
                          </ul>
                    </span>
                    @endif
                    <span class="float-end" id="titlee">
                            <span class="float-end" id="titleee">-{{ $post->title }}</span>
                        <span class="
                        {{($post->title === 'Feeling Sick')? 'font-icon fa-solid fa-face-thermometer': '' }}
                        {{($post->title === 'Feeling Sad')? 'font-icon fa-solid fa-face-sad-sweat': '' }}
                        {{($post->title === 'Feeling Emotional')? 'font-icon fa-solid fa-face-holding-back-tears': '' }}
                        {{($post->title === 'Feeling Broken')? 'font-icon-heart fa-solid fa-heart-crack': '' }}
                        {{($post->title === 'Feeling Happy')? 'font-icon fa-solid fa-face-smile': '' }}
                        {{($post->title === 'Feeling Cute')? 'font-icon fa-solid fa-face-grin-stars': '' }}
                        {{($post->title === 'Feeling Loved')? 'font-icon fa-solid fa-face-smile-hearts': '' }}
                        {{($post->title === 'Feeling Thankful')? 'font-icon fa-solid fa-face-smiling-hands': '' }}
                        {{($post->title === 'Feeling Angry')? 'font-icon fa-solid fa-face-swear': '' }}
                        {{($post->title === 'Feeling Crazy')? 'font-icon fa-solid fa-face-woozy': '' }}
                        {{($post->title === 'Feeling Hopeful')? 'font-icon fa-solid fa-face-awesome': '' }}
                        {{($post->title === 'Feeling Proud')? 'font-icon fa-solid fa-face-beam-hand-over-mouth': '' }}
                        {{($post->title === 'Feeling Fresh')? 'font-icon fa-solid fa-face-clouds': '' }}
                        {{($post->title === 'Feeling Blessed')? 'font-icon fa-solid fa-face-smile-halo': '' }}
                        {{($post->title === 'Feeling Bad')? 'font-icon fa-solid fa-face-angry-horns': '' }}
                        {{($post->title === 'Feeling Rich')? 'font-icon fa-solid fa-face-tongue-money': '' }}
                        {{($post->title === 'Feeling Betrayed')? 'font-icon fa-solid fa-face-weary': '' }}
                        {{($post->title === 'Feeling Sleepy')? 'font-icon fa-solid fa-face-sleeping': '' }}
                        {{($post->title === 'Feeling Nervous')? 'font-icon fa-solid fa-face-persevering': '' }}
                        {{($post->title === 'Feeling Uncomfortable')? 'font-icon fa-solid fa-face-pleading': '' }}
                        {{($post->title === 'Feeling Cold')? 'font-icon fa-solid fa-face-icecles': '' }}
                        {{($post->title === 'Feeling Lol')? 'font-icon fa-solid fa-face-grin-tears': '' }}
                        {{($post->title === 'Feeling In loved')? 'font-icon fa-solid fa-face-kiss-wink-hearts': '' }}
                        {{($post->title === 'Feeling Incomplete')? 'font-icon fa-solid fa-face-dotted': '' }}
                        {{($post->title === 'Feeling Cool')? 'font-icon fa-solid fa-face-sunglasses': '' }}
                        {{($post->title === 'Feeling Cool')? 'font-icon fa-solid fa-face-surprise': '' }}
                        {{($post->title === 'Feeling Cool')? 'font-icon fa-solid fa-face-sad-cry': '' }}
                        {{($post->title === 'Feeling Explode')? 'font-icon fa-solid fa-face-explode': '' }}
                        {{($post->title === 'Feeling Disguise')? 'font-icon fa-solid fa-face-disguise': '' }}
                        "></span></span>
                        <img class="profile2" src="
                        {{($post->user->gender === 'Male') ? asset('images/male.png') : ''}}
                        {{($post->user->gender === 'Female') ? asset('images/female.png') : ''}}
                        {{($post->user->gender === 'Transgender') ? asset('images/transgender.png') : ''}}
                        {{($post->user->gender === 'Bisexual') ? asset('images/bisexual.png') : ''}}
                        ">
                    <a class="name" href="/my-post">{{ $post->user->name }}</a><br>
                    <span class="time">{{ $post->created_at->format('g:i A') }}</span>
                </div>
                <div class="card-body">
                    <div class="contentt"><span>{{ $post->content }}</span></div>
                </div>
                <div class="card-footer">
                    <span id="lc"><i class="fa-light fa-thumbs-up"></i> Like</span>
                    <span id="lc"><i class="fa-light fa-message"></i> Comment</span>
                    <span class="float-end" id="genderr">&nbsp;{{ $post->user->gender }}</span>
                    <div class="float-end
                        {{($post->user->gender === 'Male')? 'male fa-regular fa-mars': '' }}
                        {{($post->user->gender === 'Female')? 'female fa-regular fa-venus': '' }}
                        {{($post->user->gender === 'Bisexual')? 'bisexual fa-regular fa-venus-mars': '' }}
                        {{($post->user->gender === 'Transgender')? 'transgender fa-regular fa-transgender': '' }}">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @if($posts->isEmpty())
        <div class="text-gray-500">
            <h1 class="text-center">No posts yet.</h1>
        </div>
    @endif
    <button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>
</div>

<style>
    #text-area {
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
        color: white;
    }
    .name {
        color: whitesmoke;
        font-size: 20px;
        text-decoration: none;
    }
    .name:hover {
        color: rgb(204, 202, 202);
    }
    #write {
        background-color: rgba(116, 115, 115, 0.661);
    }
    .write-2 {
        border-radius: 20px;
    }
    .write-2:hover {
        background-color: rgba(255, 255, 255, 0.789);
    }
    #modall {
        background-color: rgb(52, 52, 52);
        margin-top: 20%;
    }
    .modal-title {
        margin-left: 38%;
    }
    .close {
        border-radius: 50%;
        background-color: rgb(65, 64, 64);
        border: 1px solid rgb(65, 64, 64);
        width: 30px;
    }
    .close span {
        color: whitesmoke;
    }
    .close:hover {
        background-color: rgb(125, 121, 121);
    }
    #cardd {
        background-color: rgba(116, 115, 115, 0.661);
        color: whitesmoke;
    }
    .time {
        font-size: 13px;
        margin-left: 45px;
        opacity: 0.8;
    }
    .contentt span {
        font-size: 19px;
    }
    #titlee {
        color: rgb(21, 21, 103);
        font-weight: bold;
        font-style: italic;
        font-size: 14px;
        opacity: 0.8;
    }
    #titleee {
        margin-right: 15px;
        margin-top: 5px;
    }
    #genderr {
        color: rgb(21, 21, 103);
        font-weight: bold;
        font-style: italic;
        font-size: 13px;
        opacity: 0.8;
    }
    .alert {
        background-color: rgba(0, 0, 0, 0.12);
    }
    .form-select {
        background-color: rgb(52, 52, 52);
        color: whitesmoke;
    }
    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 16px;
        border: none;
        outline: none;
        background-color: rgb(9, 85, 2);
        color: rgb(180, 175, 175);
        cursor: pointer;
        border-radius: 4px;
        padding: 5px;
    }
    #myBtn:hover {
        background-color: rgb(8, 61, 3);
    }
    #lc {
        padding: 5px 50px 5px 50px;
        border-radius: 5px;
        cursor: pointer;
    }
    #lc:hover {
        background-color: rgba(89, 88, 88, 0.593);
    }
    .male {
        background-color: rgb(5, 5, 147);
        padding: 3px;
        border-radius: 3px;
    }
    .female {
        background-color: rgb(243, 27, 239);
        padding: 3px;
        border-radius: 3px;
    }
    .bisexual {
        background-image: linear-gradient(to left, violet, indigo, blue, green, rgba(255, 255, 0, 0.275), rgba(255, 166, 0, 0.407), red);
        padding: 3px;
        color: rgb(229, 220, 229);
        border-radius: 3px;
    }
    .transgender {
        background-image: linear-gradient(to left, rgb(42, 162, 242), rgb(206, 115, 189),rgb(245, 229, 246), rgb(206, 115, 189), rgb(42, 162, 242));
        padding: 3px;
        color: rgb(23, 17, 84);
        border-radius: 3px;
    }
    .font-icon {
        font-size: 30px;
        border-radius: 50%;
        padding: 2px;
        opacity: 0.8;
        color: rgb(241, 241, 33);
    }
    .font-icon-heart {
        font-size: 30px;
        border-radius: 50%;
        padding: 2px;
        color: red;
        opacity: 0.8;
    }
    #dot-icon {
        padding: 5px 12px 5px 12px;
        background-color: rgb(206, 204, 204);
        border-radius: 50%;
        cursor: pointer;
    }
    #dot-icon:hover {
        background-color: rgb(230, 224, 224);;
    }
    #submit-button:disabled {
        cursor: not-allowed;
        pointer-events: all !important;
    }
    .profile2 {
        width: 40px;
        border: 1px solid rgb(66, 65, 65);
        padding: 4px;
        border-radius: 50%;
    }
</style>

<script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    document.getElementById('submit-button').disabled = true;

    document.getElementById('text-area').addEventListener('keyup', e => {
   //Check for the input's value
    if (e.target.value == "") {
        document.getElementById('submit-button').disabled = true;
    } else {
        document.getElementById('submit-button').disabled = false;
    }
    });

</script>
