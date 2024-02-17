"use strict";

function getPathTo(element) {
    if (element.id !== '') {
        if (element.id != 'crawlomatic_container') {
            var res = element.id;
            res = res.replace('/\\/g', "");
            res = res.replace('/"/g', "");
            res = res.replace('/\'/g', "");
            return "//*[@id='" + res + "']";
        } else {
            return '//body/*';
        }
    }
    var res = element.className;
    if (res !== '' && res != 'highlight') {
        res = res.replace('highlight ', "");
        res = res.replace(' highlight ', " ");
        res = res.replace(' highlight', "");
        res = res.replace('/\\/g', "");
        res = res.replace('/"/g', "");
        res = res.replace('/\'/g', "");
        if (res !== '' && res != ' ') {
            res = jQuery.trim(res);
            if (res == '') {
                return crawlomatic_get_tree_xpath(element);
            }
            return "//*[@class='" + res + "']";
        }
    }
    var itempropz = element.getAttribute("itemprop");
    if (itempropz !== '' && itempropz !== null) {
        return "//*[@itemprop='" + itempropz + "']";
    }
    if (element === document.body) {
        return '//body/*';
    }
    return getPathTo(element.parentNode);
}

function crawlomatic_get_tree_xpath(element) {
    var paths = [];
    for (; element && element.nodeType == Node.ELEMENT_NODE; element = element.parentNode) {
        var index = 0;
        var moreSiblings = false;
        for (var sibling = element.previousSibling; sibling; sibling = sibling.previousSibling) {
            if (sibling.nodeType == Node.DOCUMENT_TYPE_NODE)
                continue;

            if (sibling.nodeName == element.nodeName)
                ++index;
        }

        for (var sibling = element.nextSibling; sibling && !moreSiblings; sibling = sibling.nextSibling) {
            if (sibling.nodeName == element.nodeName)
                moreSiblings = true;
        }

        var tagName = (element.prefix ? element.prefix + ":" : "") + element.localName;
        var pathIndex = (index || moreSiblings ? "[" + (index + 1) + "]" : "");
        if (element.id && !(element.id.match(/[0-9]+/))) {
            tagName = "/*";
            pathIndex = '[@id="' + element.id + '"]';
        };

        paths.splice(0, 0, tagName + pathIndex);

        if (element.id && !(element.id.match(/[0-9]+/))) {
            break;
        }

    }

    return paths.length ? "/" + paths.join("/") : null;
};
(function($) {

    $.crawlomatic_iframe = function() {
        $('body').prepend('<div class="crawlomatic_iframe__overlay"><div class="crawlomatic_iframe__centerWrap"><div class="crawlomatic_iframe__centerer"><div class="crawlomatic_iframe__contentWrap" style="background: url(https://1.bp.blogspot.com/-vIHeaMvTAts/XOsDjqTD0jI/AAAAAAAAAx4/SRvufVxlRwYufBlZVmWUYng_dhW0rs2OwCLcBGAs/s1600/loading.gif) no-repeat center"><div class="crawlomatic_iframe__scaleWrap" style="visibility: hidden;"><div class="crawlomatic_iframe__closeBtn"><p>x</p></div>');
    };
    $('.crawlomatic_selector').on('change', function(e) {
        var selvalue = $(this).val();
        if (selvalue != 'visual') {
            return;
        }
        e.preventDefault();
        var myCont = '';
        if (jQuery(this).attr('data-target-field-cont') != '') {
            myCont = jQuery(this).attr('data-target-field-cont');
            if (myCont === undefined) {
                myCont = '';
            }
        }
        var mySrc = '';
        if (jQuery(this).attr('data-source-field-id') != '') {
            mySrc = jQuery('*[id="' + jQuery(this).attr('data-source-field-id') + myCont + '"]').val();
			mySrc = mySrc.split("\n");
			mySrc = mySrc[0];
        }
        var myDest = '';
        if (jQuery(this).attr('data-target-field-id') != '') {
            myDest = jQuery(this).attr('data-target-field-id') + myCont;
        }
        if (myDest == '') {
            return;
        }
        if(mySrc.indexOf('%%counter_') != -1)
        {
            var rexxx = /%%counter_(\d+)_(\d+)_(\d+)%%/;
            mySrc = mySrc.replace(rexxx, '$1');
        }
        var crawl_children = 'false';
        if (jQuery(this).attr('data-child-type-field-id') != '') {
            var myChildTypeSel = jQuery(this).attr('data-child-type-field-id') + myCont;
            var myChildType = jQuery('#' + myChildTypeSel).val();
            if(myChildType != undefined && myChildType != 'disabled')
            {
                crawl_children = myChildType;
            }
        }
        var crawl_children_expression = 'false';
        if (jQuery(this).attr('data-child-expression-field-id') != '') {
            var myChildExpressionSel = jQuery(this).attr('data-child-expression-field-id') + myCont;
            var myChildExpression = jQuery('#' + myChildExpressionSel).val();
            if(myChildExpression != undefined && myChildExpression != 'disabled')
            {
                crawl_children_expression = myChildExpression;
            }
        }
        if (crawl_children != 'search' && (mySrc === undefined || mySrc.indexOf('http') == -1)) {
            alert('You did not enter a valid crawling start URL (in the "Scraper Start (Seed) URL" settings field)');
            return;
        }
        var crawlCookie = jQuery('textarea#crawlomatic_custom_cookies' + myCont).val();
        var htuser = jQuery('textarea#htuser' + myCont).val();
        var phantom_wait = jQuery('input#phantom_wait' + myCont).val();
        var clickelement = jQuery('input#clickelement' + myCont).val();
        var customUA = jQuery('textarea#customUA' + myCont).val();
        var scripter = jQuery('textarea#scripter' + myCont).val();
        var request_delay = jQuery('input#request_delay' + myCont).val();
        var usephantom = jQuery('select#use_phantom' + myCont).val();
        var local_storage = jQuery('textarea#local_storage' + myCont).val();
        var post_fields = jQuery('textarea#post_fields' + myCont).val();
        var enable_adblock = '0';
        if (jQuery('#enable_adblock' + myCont).is(":checked"))
        {
            enable_adblock = '1';
        }
        var auto_captcha = '0';
        if (jQuery('#auto_captcha' + myCont).is(":checked"))
        {
            auto_captcha = '1';
        }
        var iframeUrl = ajaxurl + '?action=crawlomatic_iframe&address=' + encodeURIComponent(mySrc) + '&crawl_children=' + crawl_children + '&crawl_children_expression=' + crawl_children_expression;
        if (crawlCookie != '') {
            iframeUrl += '&crawlCookie=' + encodeURIComponent(crawlCookie);
        }
        if (clickelement != '') {
            iframeUrl += '&clickelement=' + encodeURIComponent(clickelement);
        }
        if (usephantom != '') {
            iframeUrl += '&usephantom=' + encodeURIComponent(usephantom);
        }
        if (customUA != '') {
            iframeUrl += '&customUA=' + encodeURIComponent(customUA);
        }
        if (htuser != '') {
            iframeUrl += '&htuser=' + encodeURIComponent(htuser);
        }
        if (phantom_wait != '') {
            iframeUrl += '&phantom_wait=' + encodeURIComponent(phantom_wait);
        }
        if (request_delay != '') {
            iframeUrl += '&request_delay=' + encodeURIComponent(request_delay);
        }
        if (scripter != '') {
            iframeUrl += '&scripter=' + encodeURIComponent(scripter);
        }
        if (post_fields != '') {
            iframeUrl += '&post_fields=' + encodeURIComponent(post_fields);
        }
        if (local_storage != '') {
            iframeUrl += '&local_storage=' + encodeURIComponent(local_storage);
        }
        if (enable_adblock == '1') {
            iframeUrl += '&enable_adblock=1';
        }
        if (auto_captcha == '1') {
            iframeUrl += '&auto_captcha=1';
        }
        $('.crawlomatic_iframe__overlay .crawlomatic_iframe__scaleWrap').append('<iframe id="cr_page_frame" src="' + iframeUrl + '">');

        $('.crawlomatic_iframe__overlay').fadeIn(750);
        $("#cr_page_frame").load(function() {

            $('.crawlomatic_iframe__scaleWrap').css('visibility', 'visible');
            var prev;
            var doc = document.getElementById("cr_page_frame").contentDocument;
            doc.body.onmouseover = handler;

            function handler(event) {

                if (event.target === doc.body ||
                    (prev && prev === event.target)) {
                    return;
                }
                if (prev) {
                    prev.className = prev.className.replace(/\bhighlight\b/, '');
                    prev = undefined;
                }
                if (event.target) {
                    prev = event.target;
                    prev.className += " highlight";
                }
            }
            $("#cr_page_frame").contents().find("body *").on('click', function() {
                if (jQuery(this).hasClass('highlight')) {
                    var xpathval = '';
                    var element = $(this)[0];
                    if (element && element.id && !(element.id.match(/[0-9]+/)))
                        xpathval = "//*[@id='" + element.id + "']";
                    else
                        xpathval = getPathTo(element);
                    jQuery('#' + myDest).val(xpathval);
                    
                    $('.crawlomatic_iframe__overlay').fadeOut(750, function() {
                        $(this).find('iframe').remove();
                        jQuery('.crawlomatic_iframe__scaleWrap').css('visibility', 'hidden');
                    });

                    return false;

                }


            });
        })

        $('.crawlomatic_iframe__overlay iframe').on('click', function(e) {
            e.stopPropagation();
        });

        $('.crawlomatic_iframe__overlay').on('click', function(e) {
            e.preventDefault();
            $('.crawlomatic_iframe__overlay').fadeOut(750, function() {
                $(this).find('iframe').remove();
                jQuery('.crawlomatic_iframe__scaleWrap').css('visibility', 'hidden');
            });
        });
    });
}(jQuery));

jQuery.crawlomatic_iframe();


var ajaxurl = mycustomsettings.ajaxurl;
jQuery(document).ready(function() {
    jQuery('span.wpcrawlomatic-delete').on('click', function() {
        var confirm_delete = confirm('Delete This Rule?');
        if (confirm_delete) {
            jQuery(this).parent().parent().remove();
            jQuery('#myForm').submit();
        }
    });
});
var unsaved = false;
jQuery(document).ready(function() {
    jQuery(":input").change(function() {
        var classes = this.className;
        var classes = this.className.split(' ');
        var found = jQuery.inArray('actions', classes) > -1;
        if (this.id != 'select-shortcode' && this.id != 'PreventChromeAutocomplete' && !found)
            unsaved = true;
    });

    function unloadPage() {
        if (unsaved) {
            return "You have unsaved changes on this page. Do you want to leave this page and discard your changes or stay on this page?";
        }
    }
    window.onbeforeunload = unloadPage;
});

function deletePostsManual(number, type) {
    if (confirm("Are you sure you want to delete all posts generated by this rule?") == true) {
        document.getElementById("run_img" + number).style.visibility = "visible";
        document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/running.gif";
        var data = {
            action: 'crawlomatic_my_action',
            id: number,
            how: type
        };
        jQuery.post(ajaxurl, data, function(response) {
            if (response.trim() == 'ok') {
                document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/ok.gif";
            } else {
                if (response.trim() == 'nochange') {
                    document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/nochange.gif";
                } else {
                    document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/failed.gif";
                }
            }
        }).fail( function(xhr) 
        {
            console.log('Error occured in processing: ' + xhr.statusText + ' - please check plugin\'s \'Activity and Logging\' menu for details.');
            document.getElementById("run_img" + number).src= mycustomsettings.plugin_dir_url + "images/failed.gif";
        });
    } else {
        return;
    }
}

function duplicatePostsManual(number, type) {
    if (confirm("Are you sure you want to duplicate this rule?") == true) {
        document.getElementById("run_img" + number).style.visibility = "visible";
        document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/running.gif";
        var data = {
            action: 'crawlomatic_my_action',
            id: number,
            how: type
        };
        jQuery.post(ajaxurl, data, function(response) {
            if (response.trim() == 'ok') {
                document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/ok.gif";
                location.reload();
            } else {
                if (response.trim() == 'nochange') {
                    document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/nochange.gif";
                } else {
                    document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/failed.gif";
                }
            }
        }).fail( function(xhr) 
        {
            console.log('Error occured in processing: ' + xhr.statusText + ' - please check plugin\'s \'Activity and Logging\' menu for details.');
            document.getElementById("run_img" + number).src= mycustomsettings.plugin_dir_url + "images/failed.gif";
        });
    } else {
        return;
    }
}

function runNowManual(number) {
    if (confirm("Are you sure you want to run this rule now?") == true) {
        document.getElementById("run_img" + number).style.visibility = "visible";
        document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/running.gif";
        var data = {
            action: 'crawlomatic_run_my_action',
            id: number
        };
        jQuery.post(ajaxurl, data, function(response) {
            if (response.trim() == 'ok') {
                document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/ok.gif";
            } else {
                if (response.trim() == 'nochange') {
                    document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/nochange.gif";
                } else {
                    document.getElementById("run_img" + number).src = mycustomsettings.plugin_dir_url + "images/failed.gif";
                }
            }
        }).fail( function(xhr) 
        {
            console.log('Error occured in processing: ' + xhr.statusText + ' - please check plugin\'s \'Activity and Logging\' menu for details.');
            document.getElementById("run_img" + number).src= mycustomsettings.plugin_dir_url + "images/failed.gif";
        });
    } else {
        return;
    }
}


function actionsChangedManual(ruleId, selectedValue) {
    if (selectedValue === 'run') {
        if (unsaved) {
            alert("You have unsaved changes on this page. Please save your changes before manually running rules!");
            return;
        }
        runNowManual(ruleId);
    } else {
        if (selectedValue === 'duplicate') {
            duplicatePostsManual(ruleId, 'duplicate');
        } else {
            if (selectedValue === 'trash') {
                deletePostsManual(ruleId, 'trash');
            } else {
                deletePostsManual(ruleId, 'delete');
            }
        }
    }
}

jQuery(document).ready(function() {
    jQuery('.crawlomatic_image_button').on('click', function() {
        tb_show('', "media-upload.php?type=image&TB_iframe=true");
        window.send_to_editor = function(html) {
            var url = jQuery(html).attr('src');
            jQuery('#cr_input_box').val(url);
            tb_remove();
        };
    });
});

function thisonChangeHandler(cb) {
    if (cb.checked == true) {
        jQuery("input.activateDeactivateClass:checkbox").each(function() {
            jQuery(this).prop('checked', true);
        });
    } else {
        jQuery("input.activateDeactivateClass:checkbox").each(function() {
            jQuery(this).prop('checked', false);
        });
    }
}
var codemodalfzr = document.getElementById('mymodalfzr');
var btn = document.getElementById("mybtnfzr");
var span = document.getElementById("crawlomatic_close");
var ok = document.getElementById("crawlomatic_ok");
if (btn != null) {
    btn.onclick = function() {
        codemodalfzr.style.display = "block";
    }
}
if (span != null) {
    span.onclick = function() {
        codemodalfzr.style.display = "none";
    }
}
if (ok != null) {
    ok.onclick = function() {
        codemodalfzr.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == codemodalfzr) {
        codemodalfzr.style.display = "none";
    }
}
jQuery("#myForm").on('submit', function() {

    var this_master = jQuery(this);
    jQuery('button[type=submit], input[type=submit]').prop('disabled', true);
    this_master.find('input[type="checkbox"]').each(function() {
        var checkbox_this = jQuery(this);

        if (checkbox_this.attr("id") !== "exclusion") {
            if (checkbox_this.is(":checked") == true) {
                checkbox_this.attr('value', '1');
            } else {
                checkbox_this.prop('checked', true);
                checkbox_this.attr('value', '0');
            }
        }
    });
    if (typeof mycustomsettings.max_input_vars !== 'undefined' && jQuery('input, textarea, select, button').length >= mycustomsettings.max_input_vars) {
        this_master.append("<span style='color:red;'>Saving settings, please wait...</span>");
        var coderevolution_max_input_var_data = this_master.serialize();
        this_master.find("table").remove();
        this_master.append("<input type='hidden' class='coderevolution_max_input_var_data' name='coderevolution_max_input_var_data'/>");
        this_master.find("input.coderevolution_max_input_var_data").val(coderevolution_max_input_var_data);
    }
})

function createAdmin(i) {
    var modals = [];
    var btns = [];
    var spans = [];
    var oks = [];
    var btns = [];
    var myarr = [];
    modals = document.getElementById("mymodalfzr" + i);
    btns = document.getElementById("mybtnfzr" + i);
    spans = document.getElementById("crawlomatic_close" + i);
    oks = document.getElementById("crawlomatic_ok" + i);
    btns.onclick = function(e) {
        modals.style.display = "block";
    }
    spans.onclick = function(e) {
        modals.style.display = "none";
    }
    oks.onclick = function(e) {
        modals.style.display = "none";
    }
    modals.addEventListener("click", function(e) {
        if (e.target !== this)
            return;
        modals.style.display = "none";
    }, false);
}