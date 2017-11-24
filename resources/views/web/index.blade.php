@extends('web.layout')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>最近6期开奖数据</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @foreach($late as $item)
                    <div>
                        <span>{{$item->issue_date}}</span>
                        <span>[{{$item->issue}}]</span>
                    </div>

                    <div class="row">
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red1,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red2,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red3,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red4,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red5,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red6,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-success btn-circle" type="button">
                            {{str_pad($item->blue,2,"0",STR_PAD_LEFT) }}
                        </button>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>机选5注</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                @foreach($rand as $item)
                    <div class="row">
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red1,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red2,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red3,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red4,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red5,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-danger btn-circle" type="button">
                            {{str_pad($item->red6,2,"0",STR_PAD_LEFT) }}
                        </button>
                        <button class="btn btn-success btn-circle" type="button">
                            {{str_pad($item->blue,2,"0",STR_PAD_LEFT) }}
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection