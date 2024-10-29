@push('css')
<style>
    .contact_us * {
        font-family: Nunito, sans-serif;
        width: 100%;
        height: 100%;
    }

    .contact_us .text-blk {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        line-height: 25px;
    }

    .contact_us .responsive-cell-block {
        min-height: 75px;
    }

    .contact_us input:focus {
        outline-color: initial;
        outline-style: none;
        outline-width: initial;
    }

    .contact_us .container-block {
        min-height: 75px;
        height: fit-content;
        width: 100%;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
        display: block;
    }

    .contact_us .responsive-container-block {
        min-height: 75px;
        height: fit-content;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 50px;
        margin-left: auto;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .contact_us .responsive-container-block.big-container {
        background-color: #03a9f4;
        position: static;
        height: auto;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        padding-top: 0px;
        padding-right: 30px;
        padding-bottom: 0px;
        padding-left: 30px;
    }

    .contact_us .responsive-container-block.container {
        position: static;
        min-height: 75px;
        flex-direction: column;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        background-color: #00b289;
    }

    .contact_us .container-block.form-wrapper {
        background-color: white;
        max-width: 1000px;
        text-align: center;
        box-shadow: rgba(0, 0, 0, 0.05) 0px 4px 20px 7px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
        border-bottom-left-radius: 30px;
        padding-top: 90px;
        padding-right: 40px;
        padding-bottom: 75px;
        padding-left: 40px;
        margin-top: 80px;
        margin-right: auto;
        margin-bottom: 100px;
        margin-left: auto;
    }

    .contact_us .text-blk.contactus-head {
        font-size: 38px;
        line-height: 52px;
        font-weight: 900;
    }

    .contact_us .text-blk.contactus-subhead {
        color: #9c9c9c;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 50px;
        margin-left: 0px;
    }

    .contact_us .responsive-cell-block.wk-desk-6.wk-ipadp-6.wk-tab-12.wk-mobile-12 {
        min-height: 50px;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 55px;
        margin-left: 0px;
    }

    .contact_us .input {
        width: 96%;
        height: 48px;
        padding-top: 1px;
        padding-right: 15px;
        padding-bottom: 1px;
        padding-left: 15px;
        font-size: 16px;
        color: black;
        border-top-width: initial;
        border-right-width: initial;
        border-bottom-width: 3px;
        border-left-width: initial;
        border-top-style: none;
        border-right-style: none;
        border-bottom-style: solid;
        border-left-style: none;
        border-top-color: initial;
        border-right-color: initial;
        border-bottom-color: #d8d7d7;
        border-left-color: initial;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
    }

    .contact_us .textinput {
        width: 98%;
        min-height: 220px;
        padding-top: 20px;
        padding-right: 15px;
        padding-bottom: 20px;
        padding-left: 15px;
        border-top-width: 2px;
        border-right-width: 2px;
        border-bottom-width: 2px;
        border-left-width: 2px;
        border-top-style: solid;
        border-right-style: solid;
        border-bottom-style: solid;
        border-left-style: solid;
        border-top-color: #eeeeee;
        border-right-color: #eeeeee;
        border-bottom-color: #eeeeee;
        border-left-color: #eeeeee;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        font-size: 16px;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;
        background-color: #f1f2f3;
    }

    .contact_us .submit-btn {
        width: auto;
        background-color: #00b289;
        height: 58px;
        font-size: 20px;
        font-weight: 600;
        color: white;
        border-top-width: 0px;
        border-right-width: 0px;
        border-bottom-width: 0px;
        border-left-width: 0px;
        border-top-style: outset;
        border-right-style: outset;
        border-bottom-style: outset;
        border-left-style: outset;
        border-top-color: #767676;
        border-right-color: #767676;
        border-bottom-color: #767676;
        border-left-color: #767676;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        padding-top: 1px;
        padding-right: 60px;
        padding-bottom: 1px;
        padding-left: 60px;
        border-top-left-radius: 35px;
        border-top-right-radius: 35px;
        border-bottom-right-radius: 35px;
        border-bottom-left-radius: 35px;
        cursor: pointer;
    }

    .contact_us .form-box {
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        padding-top: 80px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
    }

    .contact_us .text-blk.input-title {
        text-align: left;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 10px;
        font-size: 19px;
        color: black;
        font-weight: 600;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 15px;
        margin-left: 0px;
    }

    .contact_us ::placeholder {
        color: #b4b4b4;
    }

    .contact_us .text-blk.contact-head {
        font-size: 36px;
        line-height: 50px;
        font-weight: 700;
        color: white;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 15px;
        margin-left: 0px;
    }

    .contact_us .text-blk.contact-subhead {
        max-width: 670px;
        font-size: 20px;
        line-height: 27px;
        color: white;
    }

    @media (max-width: 1024px) {
        .contact_us .responsive-container-block.container {
            padding-top: 0px;
            padding-right: 30px;
            padding-bottom: 0px;
            padding-left: 30px;
        }

        .contact_us .container-block.form-wrapper {
            margin-top: 60px;
            margin-right: 0px;
            margin-bottom: 80px;
            margin-left: 0px;
        }
    }

    @media (max-width: 768px) {
        .contact_us .submit-btn {
            width: 100%;
        }

        .contact_us .input {
            width: 100%;
        }

        .contact_us .textinput {
            width: 100%;
        }

        .contact_us .container-block.form-wrapper {
            margin-top: 80px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .contact_us .text-blk.input-title {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .contact_us .container-block.form-wrapper {
            margin-top: 80px;
            margin-right: 0px;
            margin-bottom: 80px;
            margin-left: 0px;
        }

        .contact_us .text-blk.contact-subhead {
            font-size: 18px;
        }
    }

    @media (max-width: 500px) {
        .contact_us .container-block.form-wrapper {
            padding-top: 50px;
            padding-right: 15px;
            padding-bottom: 50px;
            padding-left: 15px;
        }

        .contact_us .container-block.form-wrapper {
            margin-top: 60px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .contact_us .responsive-cell-block.wk-ipadp-6.wk-tab-12.wk-mobile-12.wk-desk-6 {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 15px;
            margin-left: 0px;
        }

        .contact_us .responsive-container-block {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 35px;
            margin-left: 0px;
        }

        .contact_us .text-blk.input-title {
            font-size: 12px;
        }

        .contact_us .responsive-container-block.container {
            padding-top: 0px;
            padding-right: 20px;
            padding-bottom: 0px;
            padding-left: 20px;
        }

        .contact_us .container-block.form-wrapper {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
            padding-top: 50px;
            padding-right: 20px;
            padding-bottom: 50px;
            padding-left: 20px;
            margin-top: 50px;
            margin-right: 0px;
            margin-bottom: 80px;
            margin-left: 0px;
        }

        .contact_us .form-box {
            padding-top: 50px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .contact_us .text-blk.contact-head {
            font-size: 35px;
            line-height: 40px;
        }

        .contact_us .text-blk.contact-subhead {
            font-size: 16px;
            line-height: 24px;
        }

        .contact_us .text-blk.input-title {
            font-size: 16px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 10px;
            margin-left: 0px;
        }

        .contact_us .responsive-cell-block.wk-ipadp-6.wk-tab-12.wk-mobile-12.wk-desk-6 {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 35px;
            margin-left: 0px;
        }

        .contact_us .input {
            height: 40px;
        }

        .contact_us .text-blk.contact-head {
            font-size: 26px;
            line-height: 35px;
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 10px;
            margin-left: 0px;
        }

    }
</style>

@endpush
<form action="{{ route('contact.post') }}" method="post" >
    @csrf
    <div class="contact_us">
        <div class="responsive-container-block container">
            <form class="form-box">
                <p class="text-blk contact-head" style="text-align: center">
                    Contuct Us
                </p>

                <div class="container-block form-wrapper">
                    <div class="responsive-container-block">
                        <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6" id="i10mt-4">
                            <p class="text-blk input-title">
                                Subject
                            </p>
                            <input class="input" id="ijowk-4" name="subject">
                        </div>

                        <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                            <p class="text-blk input-title">
                                Email
                            </p>
                            <input class="input" id="ipmgh-4" name="email">
                        </div>

                        <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12" id="i634i-4">
                            <p class="text-blk input-title">
                                Message
                            </p>
                            <textarea class="textinput" name="massage" id="i5vyy-4" placeholder="Write your message..."></textarea>
                        </div>
                    </div>
                    <button class="submit-btn">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</form>

