@push('css')
    <style>
        /* @import url("https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700");
        $main-font: 'Libre Baskerville', serif; */

        /* // COLORS
        $white: #fff;
        $black: #000;
        $palette: #FFCDC4, #D5BEE8, #D1F1FF, #B2E8B3, #FFF7D1; */
/*
        // FUNCTIONS
        @function palette($col) {
            @return nth($palette, $col);
        }

        // MIXINS
        @mixin pseudo-ready($position: absolute) {
            position: relative;

            &::before,
            &::after {
                content: '';
                position: $position;
            }
        } */

        /* // GENERAL
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
 */

        body {
            font-family: $main-font;
            font-size: 16px;
            /* padding: 3rem 1rem 0; */
            /* display: flex; */
            /* flex-direction: column; */
            align-items: center;
            /* background: lighten(palette(2), 6%); */
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            font-weight: normal;
        }

        h1 {
            margin: 0 0 4rem;
            text-align: center;
            font-size: 1.6em;
            color: darken(palette(2), 10%);
        }

        .wrap-cards {
            display: flex;
            flex-wrap: wrap;
            margin: 30px;
            margin-right: 40px;
            margin-left: 40px;
            column-gap: 150px;

            justify-content: space-between;
        }


        // CARDS STYLES
        .card {
            width: 40%;
            max-width: 100%;
            margin: 0 0 4rem;
            box-shadow: 0 15px 10px -10px rgba($black, .25);
            background-color: palette(2);

            .wrap-image {
                position: relative;

                img {
                    width: 100%;
                    height: auto;
                }

                /* svg {
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100%;
                    //set height to vh if you want angle to be same while screen width changes
                    //set height to pixels if you want angle to change with screen width
                    height: 30px; */

                    /* polygon,
                    path {
                        fill: palette(2);
                        stroke: palette(2);
                    }
                } */
            }

            /* &:nth-child(4) {
                .wrap-image {
                    svg {
                        path {
                            stroke-width: 3px;
                        }
                    }
                }
            } */

            /* &:nth-child(5) {
                .wrap-image {
                    svg {
                        path {
                            stroke-width: 4px;
                        }
                    }
                }
            } */

            /* &:nth-child(6) {
                .wrap-image {
                    svg {
                        path {
                            stroke-width: 6px;
                        }
                    }
                }
            } */
            .card-text{
                color: #070606;
            }

            .contents {
                padding: 1rem;

                h3 {
                    margin: 0 0 .5rem;
                    font-size: 1.125em;
                    color:black;
                }

                p{
                    color: #000;
                }

                .text {
                    color: rgba($black, .5);
                    line-height: 1.6;
                    font-size: .9em;
                } */
            }
        }


        /* // RESPONSIVE GRID
        /* @media all and (max-width: 768px) {
            .card {
                width: 49%;
                margin-bottom: 3rem;
            }
        }

        @media all and (max-width: 480px) {
            .card {
                width: 100%;
                margin-bottom: 3rem;
            }
        }

        button{
            padding: 2px;
            margin: 5px;
            color: rgb(136, 255, 0);
        } */

        button{
            padding: 2px;
            margin: 5px;
            color: rgb(0, 255, 136);
            text-align: center;
            margin-right: 50%;
        }
    </style>
@endpush

<div class="wrap-cards">
    @foreach ($blogs as $blog)
        <div class="card" style="width: 18rem;">
            <div class=".wrap-image">
                <img src="{{ Storage::url($blog->image) }}" class="card-img-top">
            </div>
            <div class="card-body  contents">
                <h5 class="card-title">Title: {{ $blog->title }}</h5>
                <p style="color: #000;" class="">Description: {{ $blog->description }}</p>

                <h5 class="card-title">Date:{{ $blog->created_at }}</h5>
                {{-- <p>
                    <a href="{{ 'edit/' . $blog->slug }}">Edit</a>
                    <a href="{{ 'delete/' . $blog->id }}">Delete</a>
                    {{-- <a href="">View</a> --}}
                {{-- </p> --}}
            </div>

        </div>
    @endforeach
    <button><a href="/view-blog">See more..</a></button>
</div>


