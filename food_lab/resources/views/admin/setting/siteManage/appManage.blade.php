{{--  /*
* Create:zayar(2022/01/17) 
* Update: 
*/  --}}
{{--  start profile alert box  --}}
<div id="profileAlert">
    <div class="profileAlertHeader">
        <p>back</p>
        <p class="userProfile">User Profile</p>
        <p>Efdit</p>
    </div>
    <div  class="profileAlertBody">
        <div class="profileDetail">
            <p>300 coin</p>
            <p>MG MG</p>
            <p>090909090</p>
            <p>
                asdf@gmial.com
            </p>
            <p>No123,boasdfasdfsdaf</p>
        </div>
    </div>
</div>
{{--  end profile alert box  --}}
/*
    * Create:zayar(2022/01/17) 
    * Update: 
    */
/*start Profile Alert box*/
#profileAlert {
    position: fixed;
    width: 62vh;
    height: 100vh;
    background-color: black;
    top: 20%;
    left: 68%;
}
.profileAlertHeader {
    display: flex;
    flex-direction: row;

    color: var(--primary-color);
}
.userProfile {
    font-size: 1.3rem;
    margin-left: 17vh;
    margin-right: 17vh;
    font-weight: bold;
}
.userProfileDiv {
    width: 10vh;
}
.profileAlertBody {
    width: 100%;
    height: 50vh;
    color: var(--secondary-color);
    background-color: blue;
    font-size: 1.1rem;
}
.profileDetail {
    margin-left: 15vh;
}