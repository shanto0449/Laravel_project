@push('css')
<style>
    * {
        font-family: Nunito, sans-serif;

    }

    .text-blk {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        line-height: 25px;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .responsive-cell-block {
        min-height: 75px;
    }

    .responsive-container-block {
        min-height: 75px;
        height: fit-content;
        width: 100%;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        display: flex;
        flex-wrap: wrap;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        justify-content: flex-start;
    }

    .responsive-container-block.bigContainer {
        padding-top: 0px;
        padding-right: 50px;
        padding-bottom: 0px;
        padding-left: 50px;
        margin-top: 50px;
        margin-right: 0px;
        margin-bottom: 50px;
        margin-left: 0px;
    }

    .responsive-container-block.Container {
        max-width: 1320px;
        justify-content: space-evenly;
        align-items: center;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 0px;
        padding-left: 10px;
        position: relative;
        overflow-x: hidden;
        overflow-y: hidden;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
    }

    .mainImg {
        width: 100%;
        height: 800px;
        object-fit: cover;
    }

    .blueDots {
        position: absolute;
        top: 150px;
        right: 15%;
        z-index: -1;
        left: auto;
        width: 80%;
        height: 500px;
        object-fit: cover;
    }

    .imgContainer {
        position: relative;
        width: 48%;
    }

    .responsive-container-block.textSide {
        width: 48%;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        z-index: 100;
    }

    .text-blk.heading {
        font-size: 20px;
        line-height: 40px;
        font-weight: 700;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 20px;
        margin-left: 0px;
    }


    .redDots {
        position: absolute;
        bottom: -350px;
        right: -100px;
        height: 500px;
        width: 400px;
        object-fit: cover;
        top: auto;
    }

    h1{
        text-align: center;
    }


.about h1{
    margin: 20px;
    text-align: center;
}

</style>

@endpush

<div class="about">
    <h1 style="color:black">About Us</h1>
<div class="responsive-container-block bigContainer">
    <div class="responsive-container-block Container">
        <div class="imgContainer">
            <img class="blueDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw3.svg">
            <img class="mainImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/aw2.svg">
        </div>
        <div class="responsive-container-block textSide" >
           @foreach ($abouts as $about )
           <p class="text-blk heading" style="color:black">
            {{$about->title}}
        </p>
        <p class="text-blk subHeading" style="color:black">
            {{$about->description}}
        </p>


           @endforeach

            <img class="redDots" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/cw3.svg">
        </div>
    </div>
</div>
