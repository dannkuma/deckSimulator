
$(function () {
    $('.condition_select').click(function() {
        var val = $(this).val();//value取得
        var name = $(this).attr('name');//name取得
        if($('li').length) {//liが存在する
            var length = $('li').length;
            if(name == "power") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">武力</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="power_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">武力</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="power_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else if(name == "intelligence") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">知力</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="intelligence_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">知力</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="intelligence_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else if(name == "cost") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">コスト</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="cost_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">コスト</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="cost_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else if(name == "necessary_morale") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">必要士気</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="necessary_morale_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">必要士気</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="necessary_morale_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">50音順</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="name_furigana_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">'+(length+1)+'</p><p class="sort_text">50音順</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="'+(length+1)+'" value="name_furigana_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }
        }else {//length=0のとき→初回処理
            if(name == "power") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">武力</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="power_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">武力</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="power_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else if(name == "intelligence") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">知力</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="intelligence_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">知力</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="intelligence_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else if(name == "cost") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">コスト</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="cost_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">コスト</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="cost_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else if(name == "necessary_morale") {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">必要士気</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="necessary_morale_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">必要士気</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="necessary_morale_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }else {
                if(val.includes('desc')) {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">50音順</p>'+
                        '<div class="condition_area"><button type="button" class="desc click">▼</button>'+
                        '<button type="button" class="asc">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="name_furigana_desc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).next().prop('disabled', true);
                } else {
                    $('ul').append('<li class="condition_block">'+
                        '<p class="sort_number">1</p><p class="sort_text">50音順</p>'+
                        '<div class="condition_area"><button type="button" class="desc">▼</button>'+
                        '<button type="button" class="asc click">▲</button></div>'+
                        '<div class="condition_move_area"><button type="button" class="change_down">↓</button><button type="button" class="change_up">↑</button></div>'+
                        '<input type="hidden" name="1" value="name_furigana_asc">'+
                        '<button type="button" class="remove">×</button>'+
                        '</li>');
                    $(this).prop('disabled', true);
                    $(this).prev().prop('disabled', true);
                }
            }
        }
        var name_1 = $('input[name="1"]').prev().find('button.change_up');
        if(!$(name_1).is(':disabled')) {
            $(name_1).prop('disabled', true);
            $(name_1).prev().prop('disabled', true);
        }
        var length = $('li').length;
        if(length == 2) {
            var name_2 = $('input[name="2"]').prev().find('button.change_down');
            $(name_1).prev().prop('disabled', false);
            $(name_2).prop('disabled', true);
        }else if(length == 3) {
            var name_2 = $('input[name="2"]').prev().find('button.change_down');
            $(name_2).prop('disabled', false);
            var name_3 = $('input[name="3"]').prev().find('button.change_down');
            $(name_3).prop('disabled', true);
        }else if(length == 4) {
            var name_3 = $('input[name="3"]').prev().find('button.change_down');
            $(name_3).prop('disabled', false);
            var name_4 = $('input[name="4"]').prev().find('button.change_down');
            $(name_4).prop('disabled', true);
        }else if(length == 5) {
            var name_4 = $('input[name="4"]').prev().find('button.change_down');
            $(name_4).prop('disabled', false);
            var name_5 = $('input[name="5"]').prev().find('button.change_down');
            $(name_5).prop('disabled', true);
        }
    });
});

//上と入れ替え

    function request_and_click_change(index) {//index(name)を取得してそのnameを持つhiddenのinputタグがあるか確認
        const name = $("button[name="+index+"]").attr('name');
        const value = $("button[name="+index+"]").val();
        const formData = new FormData();
        formData.append(name, value);
        fetch('general_search_insert.php', {
            method: 'POST',
            body: formData
        })
        if($("button[name="+index+"]").hasClass('click')) {
            $("button[name="+index+"]").removeClass('click');
        }else {
            $("button[name="+index+"]").addClass('click');
        }
        delete formData;
    }

    function input_and_condition_change(index) {//orとandの切り替え用
        var name = $("button[name="+index+"]").attr('name');
        if(name == 'special_skill_or') {
            if($("button[name=\"special_skill_and\"").hasClass('click') && !($("button[name="+index+"]").hasClass('click'))) {//and側がクリッククラスを持っている
                $("button[name=\"special_skill_and\"").removeClass('click');//and側のクリッククラスを削除
                $("button[name="+index+"]").addClass('click');//or側にクリッククラスを追加
            }
            if($("input[name=\"special_skill_and\"").length) {
                $("input[name=\"special_skill_and\"]").remove();
                $("form").append('<input type="hidden" name="special_skill_or" value="or">');
            }
        }
        if(name == 'special_skill_and') {
            if($("button[name=\"special_skill_or\"").hasClass('click') && !($("button[name="+index+"]").hasClass('click'))) {//and側がクリッククラスを持っている
                $("button[name=\"special_skill_or\"").removeClass('click');//and側のクリッククラスを削除
                $("button[name="+index+"]").addClass('click');//or側にクリッククラスを追加
            }
            if($("input[name=\"special_skill_or\"").length) {
                $("input[name=\"special_skill_or\"]").remove();
                $("form").append('<input type="hidden" name="special_skill_and" value="and">');
            }
        }
        if(name == 'stratagem_category_or') {
            if($("button[name=\"stratagem_category_and\"").hasClass('click') && !($("button[name="+index+"]").hasClass('click'))) {//and側がクリッククラスを持っている
                $("button[name=\"stratagem_category_and\"").removeClass('click');//and側のクリッククラスを削除
                $("button[name="+index+"]").addClass('click');//or側にクリッククラスを追加
            }
            if($("input[name=\"stratagem_category_and\"").length) {
                $("input[name=\"stratagem_category_and\"]").remove();
                $("form").append('<input type="hidden" name="stratagem_category_or" value="or">');
            }
        }
        if(name == 'stratagem_category_and') {
            if($("button[name=\"stratagem_category_or\"").hasClass('click') && !($("button[name="+index+"]").hasClass('click'))) {//and側がクリッククラスを持っている
                $("button[name=\"stratagem_category_or\"").removeClass('click');//and側のクリッククラスを削除
                $("button[name="+index+"]").addClass('click');//or側にクリッククラスを追加
            }
            if($("input[name=\"stratagem_category_or\"").length) {
                $("input[name=\"stratagem_category_or\"]").remove();
                $("form").append('<input type="hidden" name="stratagem_category_and" value="and">');
            }
        }
    }

    function special_skill_condition_initial() {//ページを初めて開いたときにspecial_skill_orにinputとclickクラスを与える
        $('.special_skill_or').addClass('click');
        $('.search_form').append('<input type=\"hidden\" name=\"special_skill_or\" value=\"or\">');
    }

    function stratagem_category_condition_initial() {//ページを初めて開いたときにstratagem_category_orにinputとclickクラスを与える
        $('.stratagem_category_or').addClass('click');
        $('.search_form').append('<input type=\"hidden\" name=\"stratagem_category_or\" value=\"or\">');
    }

    function special_skill_add_or() {//ページを再度開いたときにspecial_skill_orにinput与える
        $("input[name=\"special_skill_and\"]").remove();
        $('.search_form').append('<input type=\"hidden\" name=\"special_skill_or\" value=\"or\">');
    }

    function special_skill_add_and() {//ページを再度開いたときにspecial_skill_andにinputを与える
        $("input[name=\"special_skill_or\"]").remove();
        $('.search_form').append('<input type=\"hidden\" name=\"special_skill_and\" value=\"and\">');
    }

    function stratagem_category_add_or() {//ページを再度開いたときにstratagem_category_orにinputとclickクラスを与える
        $('.stratagem_category_or').addClass('click');
        $('.search_form').append('<input type=\"hidden\" name=\"stratagem_category_or\" value=\"or\">');
    }

    function stratagem_category_add_and() {//ページを再度開いたときにstratagem_category_andにinputとclickクラスを与える
        $('.stratagem_category_and').addClass('click');
        $('.search_form').append('<input type=\"hidden\" name=\"stratagem_category_and\" value=\"and\">');
    }

    function change_sort_display(index) {
        if(index == 'top_button_1') {
            $('.top_button_1').addClass('click');
            $('.top_button_2').removeClass('click');
            $('.top_button_3').removeClass('click');
            $('.search_body_wrapper1').addClass('select_on');
            $('.search_body_wrapper2').removeClass('select_on');
            $('.search_body_wrapper3').removeClass('select_on');
        } else if(index == 'top_button_2') {
            $('.top_button_1').removeClass('click');
            $('.top_button_2').addClass('click');
            $('.top_button_3').removeClass('click');
            $('.search_body_wrapper1').removeClass('select_on');
            $('.search_body_wrapper2').addClass('select_on');
            $('.search_body_wrapper3').removeClass('select_on');
        } else {
            $('.top_button_1').removeClass('click');
            $('.top_button_2').removeClass('click');
            $('.top_button_3').addClass('click');
            $('.search_body_wrapper1').removeClass('select_on');
            $('.search_body_wrapper2').removeClass('select_on');
            $('.search_body_wrapper3').addClass('select_on');
        }
    }