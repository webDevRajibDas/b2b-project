@extends('frontend.layouts.app')

@section('title', 'Vendor Add Form')

@section('content')

<!-- start: page -->
<section class="body-sign mb-5">
    <div class="center-sign" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 20px">
        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-right p-2">
                <h2 class="title text-uppercase font-weight-bold m-0">
                    <i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> নিচের তথ্যগুলো সঠিকভাবে পূরণ করুন
                </h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('vendorContactForm') }}" method="post" enctype="multipart/form-data" id="vendor_form">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="">আপনি কোন ধরনের পণ্য বিক্রি করেন?</label>
                        <select data-plugin-selecttwo="" class="form-control populate" name="selling_product_type">
                            <option value="">- সিলেক্ট করুন -</option>
                            <option value="পোশাক ও ফ্যাশন">পোশাক ও ফ্যাশন</option>
                            <option value="ইলেকট্রনিক্স">ইলেকট্রনিক্স</option>
                            <option value="গৃহস্থালি পণ্য">গৃহস্থালি পণ্য</option>
                            <option value="সৌন্দর্য এবং স্বাস্থ্য">সৌন্দর্য এবং স্বাস্থ্য</option>
                            <option value="অন্যান্য">অন্যান্য</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="">আপনার পণ্য সরবরাহের ধরণ কী??</label>
                        <select data-plugin-selecttwo="" class="form-control populate" name="product_type">
                            <option value="">- সিলেক্ট করুন -</option>
                            <option value="নিজস্ব ফ্যাক্টরি থেকে উৎপাদন করি">নিজস্ব ফ্যাক্টরি থেকে উৎপাদন করি</option>
                            <option value="বিদেশ থেকে আমদানি করি ">বিদেশ থেকে আমদানি করি</option>
                            <option value="হোলসেল করে থাকি">হোলসেল করে থাকি</option>
                            <option value="নিজেরা উৎপাদন&nbsp;করি">নিজেরা উৎপাদন&nbsp;করি</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="">আপনি প্রতি মাসে কতগুলো অর্ডার পরিচালনা করেন?</label>
                        <select data-plugin-selecttwo="" class="form-control populate" name="month_order">
                            <option value="">- সিলেক্ট করুন -</option>
                            <option value="৫০">৫০</option>
                            <option value="৫০-২০০">৫০-২০০</option>
                            <option value="২০০+">২০০+</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="">আপনার পণ্যের প্রধান ক্রেতারা কারা?</label>
                        <select class="target_customer form-control populate" name="target_customers[]" multiple="multiple" data-plugin-multiselect="" id="target_customer">
                            <option value="খুচরা বিক্রেতা (রিটেইল)">খুচরা বিক্রেতা (রিটেইল)</option>
                            <option value="হোলসেল বিক্রেতা">হোলসেল বিক্রেতা</option>
                            <option value="অনলাইন ই-কমার্স উদ্যোক্তা (রিটেইল)">অনলাইন ই-কমার্স উদ্যোক্তা (রিটেইল)</option>
                            <option value="মার্কেটপ্লেস (দারাজ/অ্যামাজন ইত্যাদি)">মার্কেটপ্লেস (দারাজ/অ্যামাজন ইত্যাদি)</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="">মিনিমাম অর্ডারের পরিমাণ কত?</label>
                        <select data-plugin-selecttwo="" class="form-control populate" name="minimum_order_qty">
                            <option value="">- সিলেক্ট করুন -</option>
                            <option value="১-১০ ইউনিট">১-১০ ইউনিট</option>
                            <option value="১১-৫০ ইউনিট">১১-৫০ ইউনিট</option>
                            <option value="৫১-১০০ ইউনিট">৫১-১০০ ইউনিট</option>
                            <option value="১০১-৫০০ ইউনিট">১০১-৫০০ ইউনিট</option>
                            <option value="৫০০+&nbsp;ইউনিট">৫০০+&nbsp;ইউনিট</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>ওয়েবসাইট / ফেইসবুক পেজের লিংক</label>
                        <input name="site_link" type="text" class="form-control form-control-lg">
                    </div>

                    <div class="form-group mb-3">
                        <label>মালিকের নাম</label>
                        <input name="owner_name" type="text" class="form-control form-control-lg">
                    </div>

                    <div class="form-group mb-3">
                        <label>ফ্যাক্টরি/অফিসের ঠিকানা</label>
                        <input name="factory_address" type="text" class="form-control form-control-lg">
                    </div>

                    <div class="form-group mb-3">
                        <label class="control-label text-lg-right mb-0">Email</label>
                        <div class="input-group mb-3">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </span>
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>

                    </div>

                    <div class="form-group mb-0">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label>মোবাইল নাম্বার</label>
                                <input name="mobile" type="text" class="form-control form-control-lg">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label>ওয়্যাটসঅ্যাপ নাম্বার </label>
                                <input name="whats_up" type="text" class="form-control form-control-lg">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="">আপনার পণ্য কি হোলসেল ওয়েবসাইটে বিক্রির জন্য উপযোগী?</label>
                        <select data-plugin-selecttwo="" class="form-control populate" name="wholesale_confirmation">
                            <option value="হ্যাঁ, আমার পণ্য হোলসেলে বিক্রি উপযোগী">হ্যাঁ, আমার পণ্য হোলসেলে বিক্রি উপযোগী</option>
                            <option value="না, আমার পণ্য শুধুমাত্র খুচরা&nbsp;বিক্রির&nbsp;জন্য">না, আমার পণ্য শুধুমাত্র খুচরা&nbsp;বিক্রির&nbsp;জন্য</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="">আপনার কি ট্রেড লাইসেন্স আছে?</label>
                        <select data-plugin-selecttwo="" class="form-control populate" name="trade_licence">
                            <option value="হ্যাঁ">হ্যাঁ</option>
                            <option value="না">না</option>
                        </select>
                    </div>


                    <div class="row">
                        <div class="card-body">
                            <button type="submit" class="mb-1 mt-1 mr-1 btn btn-primary btn-block">Confirm Details</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>

@endsection


@section('styles')
    <style>

        /* Sign Screens - Wrappers */
        .body-sign {

            display: table;
            height: 100vh;
            margin: 0 auto;
            max-width: 70%;
            padding: 0 20px;
            width: 100%;
        }
        div.center-sign{
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }


        .body-sign .center-sign {
            display: table-cell;
            padding-top: 20px;
            vertical-align: middle;

        }

        .body-sign .card-sign {
            background: transparent;
        }

        .body-sign .card-sign .card-title-sign .title {
            background-color: #CCC;
            border-radius: 5px 5px 0 0;
            color: #FFF;
            display: inline-block;
            font-size: 12px;
            font-size: 0.75rem;
            padding: 13px 17px;
            vertical-align: bottom;
        }

        .body-sign .card-sign .card-body {
            background: #FFF;
            border-top: 5px solid #CCC;
            border-radius: 5px 0 5px 5px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            padding: 33px 33px 15px;
        }

        /* Sign Screens - Elements */
        .body-sign .checkbox-custom {
            margin-top: 8px;
        }

        .body-sign .line-thru {
            display: block;
            font-size: 12px;
            font-size: 0.75rem;
            position: relative;
        }

        .body-sign .line-thru span {
            color: #CCC;
            position: relative;
            z-index: 3;
        }

        .body-sign .line-thru:before {
            background-color: #FFF;
            content: '';
            height: 10px;
            left: 50%;
            position: absolute;
            margin: -5px 0 0 -20px;
            top: 50%;
            width: 40px;
            z-index: 2;
        }

        .body-sign .line-thru:after {
            border-bottom: 1px solid #DADADA;
            content: '';
            display: block;
            left: 10%;
            position: absolute;
            top: 47%;
            width: 81%;
            z-index: 1;
        }

        #vendor_form select option {
            font-size: 18px !important;
        }


    </style>
@endsection