<?php $_cl0="1.6.\060.0"; if (!class_exists("\113ool\123\143rip\164\151ng",FALSE)) { class koolscripting { static function start() { ob_start(); return ""; } static function end() { $content=ob_get_clean(); $_cO0=""; $_cl1=new domdocument(); $_cl1->loadxml($content); $_cO1=$_cl1->documentElement; $id=$_cO1->getattribute("\151d"); $_cl2=$_cO1->nodeName; $id=($id == "") ? "\144ump": $id; if (class_exists($_cl2,FALSE)) { eval ("\044".$id." = ne\167\040".$_cl2."\050\047".$id."\047\051;"); $$id->loadxml($_cO1); $_cO0=$$id->render(); } else { $_cO0.=$content; } return $_cO0; } } } function _cO2($_cl3) { return md5($_cl3); } function _cO3() { $_cl4=_cO4("\134","\057",strtolower($_SERVER["\123\103RIP\124\137NAM\105"])); $_cl4=_cO4(strrchr($_cl4,"\057"),"",$_cl4); $_cl5=_cO4("\134","/",realpath(".")); $_cO5=_cO4($_cl4,"",strtolower($_cl5)); return $_cO5; } function _cO4($_cl6,$_cO6,$_cl7) { return str_replace($_cl6,$_cO6,$_cl7); } class _ci10 { static $_ci10="\1730}\173\142oxH\145\151ght}\074div \151\144='\173\151d}'\040\143la\163\163='\173\163ty\154\145}K\123\115' \163\164yl\145\075'\167idt\150\072\173\167\151dt\150};'\040\076 \173\164pl\137\142o\165\156d}\040<in\160\165t \151d='\173\151d}\056cli\145\156t\123\164a\164e' \156\141m\145\075'\173\151d\175\056c\154\151e\156\164St\141te'\040ty\160\145=\047\150i\144\144e\156\047 \057> \173\061}\040</d\151v>\173\062}"; } function _cO7() { $_cl8=_cO8(); _cl9($_cl8,0153); _cl9($_cl8,0113); _cl9($_cl8,0121); _cl9($_cl8,-014); _cl9($_cl8,050); _cl9($_cl8,041); _cl9($_cl8,034); _cl9($_cl8,(_cO9() || _cla() || _cOa()) ? -050: -011); _cl9($_cl8,-062); _cl9($_cl8,-061); _cl9($_cl8,-0111); _cl9($_cl8,-0111); $_clb=""; for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_clb.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } echo $_clb; return $_clb; } function _cld() { $_cl8=_cO8(); $_cOd=""; _cl9($_cl8,0151); _cl9($_cl8,0123); _cl9($_cl8,0114); _cl9($_cl8,071); _cl9($_cl8,-017); _cl9($_cl8,-031); for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_cOd.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } return _cle($_cOd); } function _cO9() { $_cOe=""; $_cl8=_cO8(); _cl9($_cl8,050); _cl9($_cl8,033); _cl9($_cl8,027); _cl9($_cl8,067); _cl9($_cl8,057); for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_cOe.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } return (substr(_cO2(_clf()),0,5) != $_cOe); } class _ci11 { static $_ci11=017; } function _cla() { $_cOe=""; $_cl8=_cO8(); _cl9($_cl8,045); _cl9($_cl8,0116); _cl9($_cl8,030); _cl9($_cl8,6); _cl9($_cl8,-5); for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_cOe.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } return (substr(_cO2(_cOf()),0,5) != $_cOe); } function _cOa() { $_cl8=_cO8(); _cl9($_cl8,0124); _cl9($_cl8,0115); _cl9($_cl8,0110); _cl9($_cl8,5); _cl9($_cl8,-6); $_clg=""; for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_clg.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } $_cOg=_clh($_clg); return (( isset ($_cOg[$_clg]) ? $_cOg[$_clg]: 0) != 01053/045); } function _cOh( &$_cOi) { $_cl8=_cO8(); _cl9($_cl8,0124); _cl9($_cl8,0115); _cl9($_cl8,0110); _cl9($_cl8,5); _cl9($_cl8,-6); $_clj=""; for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_clj.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } $_cOg=_clh($_clj); $_cOj=$_cOg[$_clj]; $_cOi=_cO4(_cOc(0173).(_cld()%3)._cOc(0175),(!(_cld()%_clk())) ? _clf(): _cOk(),$_cOi); for ($_cOb=0; $_cOb<3; $_cOb ++) if ((_cld()%3) != $_cOb) $_cOi=_cO4(_cOc(0173).$_cOb._cOc(0175),_cOk(),$_cOi); $_cOi=_cO4(_cOc(0173).(_cld()%3)._cOc(0175),(!(_cld()%$_cOj)) ? _clf(): _cOk(),$_cOi); return ($_cOj == _clk()); } function _clf() { $_cl8=_cO8(); _cl9($_cl8,0124); _cl9($_cl8,0115); _cl9($_cl8,0110); _cl9($_cl8,4); _cl9($_cl8,-6); $_cll=""; for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_cll.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } $_cOg=_clh($_cll); return isset ($_cOg[$_cll]) ? $_cOg[$_cll]: ""; } function _cOf() { $_cl8=_cO8(); _cl9($_cl8,0124); _cl9($_cl8,0115); _cl9($_cl8,0110); _cl9($_cl8,5); _cl9($_cl8,-7); $_clm=""; for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_clm.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } $_cOg=_clh($_clm); return isset ($_cOg[$_clm]) ? $_cOg[$_clm]: ""; } function _clk() { $_cl8=_cO8(); _cl9($_cl8,0124); _cl9($_cl8,0115); _cl9($_cl8,0110); _cl9($_cl8,5); _cl9($_cl8,-6); $_clj=""; for ($_cOb=0; $_cOb<_clc($_cl8); $_cOb ++) { $_clj.=_cOc($_cl8[$_cOb]+013*($_cOb+1)); } $_cOg=_clh($_clj); return isset ($_cOg[$_clj]) ? $_cOg[$_clj]: (0207/011); } function _cO8() { return array(); } function _clh($_cOm) { $_cln=_cOc(044); $_cOn=_cOc(072); return array($_cOm => _cle($_cOm.$_cOn.$_cOn.$_cln.$_cOm)); } function _cle($_clo) { return eval ("retur\156\040".$_clo."\073"); } function _clc($_cOo) { return sizeof($_cOo); } function _cOk() { return ""; } function _clp() { header("\103on\164\145nt-t\171\160e: \164\145xt\057\152av\141\163cri\160\164"); } function _cl9( &$_cOo,$_cOp) { array_push($_cOo,$_cOp); } function _clq() { return exit (); } function _cOc($_cOq) { return chr($_cOq); } class _ci01 { static $_ci01="<d\151\166 sty\154\145='f\157\156t-\146\141mil\171\072Ar\151\141l;\146\157nt\055\163iz\145\07210\160\164;\142\141ck\147\162ou\156\144-\143\157lo\162\072#F\105FFD\106\073co\154\157r\072\142la\143k;d\151\163pl\141\171:\142\154oc\153;vi\163\151b\151\154it\171:vi\163ibl\145\073'\076<sp\141n s\164\171l\145\075'\146ont\055fam\151ly:\101ria\154\073f\157nt-\163ize\07210\160\164;\146\157n\164\055w\145igh\164:bo\154d;c\157lo\162\072b\154ack\073di\163pla\171:i\156\154i\156e;v\151si\142ili\164y:\166isi\142le\073'>\113oo\154Sl\151de\115\145n\165</\163pa\156\076 \055 T\162ia\154 v\145\162s\151on\040\173\166\145r\163io\156} \055 C\157py\162ig\150t \050C)\040Ko\157lP\110P \056In\143 -\040<a\040st\171le\075'f\157n\164\055\146\141m\151ly\072A\162ia\154;f\157nt\055s\151ze\07210\160t;\144i\163\160l\141y\072in\154in\145;\166is\151bi\154it\171:\166is\151bl\145;\047 h\162e\146='\150t\164p:\057/w\167w\056ko\157l\160hp\056n\145t'\076w\167w.\153o\157lp\150p\056n\145t<\057a\076. \074s\160a\156 s\164y\154e=\047f\157n\164-f\141m\151ly\072\101r\151a\154;c\157l\157r:\142l\141c\153;f\157n\164-\163iz\145:\0610\160t\073d\151sp\154a\171:\151n\154in\145;\166i\163i\142il\151t\171:\166i\163i\142l\145;'\076T\157 \162e\155o\166e\074/\163pa\156>\040t\150i\163 \155e\163s\141g\145,\040p\154e\141se\040<\141 \163t\171l\145=\047f\157n\164-\146a\155i\154y\072A\162i\141l\073f\157n\164-\163i\172e\0721\060\160t\073d\151s\160l\141y\072i\156l\151n\145;\166i\163\151b\151l\151t\171:\166i\163i\142l\145;\047\040h\162e\146=\047h\164\164p\072/\057w\167w\056\153o\157l\160h\160.\156\145t\057?\155o\144=\160\165r\143h\141s\145'\076\160u\162c\150\141s\145 \141 \154i\143\145n\163e\074\057a\076.\074\057d\151v\076"; } if ( isset ($_GET[_cO2("\152s")])) { _clp(); ?> function _cO(_co){return (_co!=null);}function _cY(_cy){return document.getElementById(_cy); }function _cI(_co,_ci){if (!_cO(_ci))_ci=1; for (var i=0; i<_ci; i++)_co=_co.firstChild; return _co; }function _cA(_co,_ci){if (!_cO(_ci))_ci=1; for (var i=0; i<_ci; i++)_co=_co.nextSibling; return _co; }function _ca(_co,_ci){if (!_cO(_ci))_ci=1; for (var i=0; i<_ci; i++)_co=_co.parentNode; return _co; }function _cE(_co){return _co.className; }function _ce(_co,_cU){_co.className=_cU; }function _cu(_co,_cU){_co.style.height=_cU+"px"; }function _cZ(_co){return parseInt(_co.style.height); }function _cz(_co,_cU){_co.style.display=(_cU)?"block": "none"; }function _cX(_co){return (_co.style.display!="none"); }function _cx(_cW,_cw,_cV){_ce(_cV,_cE(_cV).replace(_cW,_cw)); }function _cv(_co,_cT){if (_co.className.indexOf(_cT)<0){var _ct=_co.className.split(" "); _ct.push(_cT); _co.className=_ct.join(" "); }}function _cS(_co,_cT){if (_co.className.indexOf(_cT)>-1){_cx(_cT,"",_co);var _ct=_co.className.split(" "); _co.className=_ct.join(" "); }}function _cs(_cW,_cR){return _cR.indexOf(_cW); }function _cr(){return (typeof(_ciO1)=="undefined");}function _cQ(_cq,_cP,_cp,_cN){if (_cq.addEventListener){_cq.addEventListener(_cP,_cp,_cN); return true; }else if (_cq.attachEvent){if (_cN){return false; }else {var _cn= function (){_cp.apply(_cq,[window.event]); };if (!_cq["ref"+_cP])_cq["ref"+_cP]=[]; else {for (var _cM in _cq["ref"+_cP]){if (_cq["ref"+_cP][_cM]._cp === _cp)return false; }}var _cm=_cq.attachEvent("on"+_cP,_cn); if (_cm)_cq["ref"+_cP].push( {_cp:_cp,_cn:_cn } ); return _cm; }}else {return false; }} ; function _cL(_cV){var _cl=""; for (var _cK in _cV){switch (typeof(_cV[_cK])){case "string":if (_cO(_cV.length))_cl+="'"+_cV[_cK]+"',"; else _cl+="'"+_cK+"':'"+_cV[_cK]+"',"; break; case "number":if (_cO(_cV.length))_cl+=_cV[_cK]+","; else _cl+="'"+_cK+"':"+_cV[_cK]+","; break; case "object":if (_cO(_cV.length))_cl+=_cL(_cV[_cK])+","; else _cl+="'"+_cK+"':"+_cL(_cV[_cK])+","; break; }}if (_cl.length>0)_cl=_cl.substring(0,_cl.length-1); _cl=(_cO(_cV.length))?"["+_cl+"]": "{"+_cl+"}"; if (_cl=="{}")_cl="null"; return _cl; }var _ck= {_cJ:function (){ this._cj=new Array(); this._cH=new Array(); this._ch=new Array(); this._cG=new Array(); this._cg=new Array(); this._cF=10; } ,_cf:function (_cD){var _cd=_cY(this._cj[_cD]); var _cC=_cA(_cI(_cd)); if (!_cO(_cC) || _cr()){ this._ch[_cD]=1; return; }_cC.style.overflow="hidden"; _cv(_cd,"ksmEffect"); _cz(_cC,1); this._cG[_cD]=(new SlideMenuPanel(this._cj[_cD])).getSlideMenu()._cc; this._cg[_cD]=_cC.offsetHeight-((this._cG[_cD]<0)?_cC.scrollHeight: this._cG[_cD])+1; if (this._cH[_cD]){_cu(_cC,1); }else {_cu(_cC,((this._cG[_cD]<0)?_cC.scrollHeight: this._cG[_cD])-this._cg[_cD]); }} ,_cB:function (_cb,_co0){if (this._cO0()){var _cD=-1; for (var i=0; i<this._cj.length; i++)if (this._cj[i]==_cb){_cD=i; }if (_cD<0){ this._cj.push(_cb); this._cH.push(_co0); this._cG.push(-1); this._cg.push(0); this._ch.push(0); this._cf(this._cj.length-1); }else { this._cH[_cD]=_co0; if (this._ch[_cD]){ this._ch[_cD]=0; this._cf(_cD); }}}else { this._cj.push(_cb); this._cH.push(_co0); this._cG.push(-1); this._cg.push(0); this._ch.push(0); }} ,_cl0:function (_ci0){ this._ci0=_cO(_ci0)?_ci0: 10; for (var i=0; i<this._ch.length; i++){ this._cf(i); } this._cI0=setTimeout( function (){_ck._co1();} ,this._cF); } ,_co1:function (){var _cO1= true; for (var i=0; i<this._ch.length; i++){var _cd=_cY(this._cj[i]); var _cC=_cA(_cI(_cd)); if (!this._ch[i]){_cO1= false; if (this._cH[i]){_cu(_cC,_cZ(_cC)+this._ci0); if (_cZ(_cC)>=((this._cG[i]<0)?_cC.scrollHeight: this._cG[i])-this._cg[i]){ this._ch[i]=1; _cC.style.height=""; _cC.style.display=""; _cC.style.overflow=""; _cS(_cd,"ksmEffect"); }}else {var _cl1=_cZ(_cC)-this._ci0; _cu(_cC,(_cl1<0)?0:_cl1); if (_cZ(_cC)<=0){ this._ch[i]=1; _cC.style.height=""; _cC.style.display=""; _cC.style.overflow=""; _cS(_cd,"ksmEffect"); }}}}if (_cO1){ this._ci1(); }else { this._cI0=setTimeout( function (){_ck._co1();} ,this._cF); }} ,_ci1:function (){clearTimeout(this._cI0); this._cI0=null; this._cJ(); } ,_cO0:function (){return _cO(this._cI0); }};_ck._cJ(); function SlideMenuParent(_cy){ this._cy=_cy; }SlideMenuParent.prototype= {expand:function (){if (!this.isExpanded()){if (!this.getSlideMenu()._cI1("OnBeforeExpand", { "ItemId": this._cy } ))return; var _co2=this.getSlideMenu(); var _cd=_cY(this._cy); if (_co2._cO2){var _cl2=_ca(_cd); for (var i=0; i<_cl2.childNodes.length; i++){var _ci2=new SlideMenuParent(_cl2.childNodes[i].id); if (_ci2.isExpanded()){_ci2.collapse(); }}}_cS(_cd,"ksmCollapse"); if (!_ck._cO0()){_ck._cJ(); _ck._cB(this._cy,1); _ck._cl0(_co2._cI2); }else {_ck._cB(this._cy,1); } this.getSlideMenu()._cI1("OnExpand", { "ItemId": this._cy } ); }} ,collapse:function (){if (_cr())return; if (this.isExpanded()){if (!this.getSlideMenu()._cI1("OnBeforeCollapse", { "ItemId": this._cy } ))return; var _cd=_cY(this._cy); var _cC=_cA(_cI(_cd)); _cv(_cd,"ksmCollapse"); if (!_ck._cO0()){_ck._cJ(); _ck._cB(this._cy,0); _ck._cl0(this.getSlideMenu()._cI2); }else {_ck._cB(this._cy,0); } this.getSlideMenu()._cI1("OnCollapse", { "ItemId": this._cy } ); }} ,isExpanded:function (){var _cd=_cY(this._cy); return (_cs("Collapse",_cE(_cd))<0);} ,getSlideMenu:function (){var _co3=_cY(this._cy); while (_cs("KSM",_cE(_co3))<0){_co3=_ca(_co3); }return eval(_co3.id); } ,getParentId:function (){var _co3=_ca(_cY(this._cy)); while (_cs("smParent",_cE(_cI(_co3)))<0){_co3=_ca(_co3); }return _co3.id; } ,_cO3:function (_cl3){if (this.isExpanded())this.collapse(); else this.expand(); } ,_ci3:function (_cl3){ this.getSlideMenu()._cI1("OnParentMouseOver", { "ItemId": this._cy } ); } ,_cI3:function (_cl3){ this.getSlideMenu()._cI1("OnParentMouseOut", { "ItemId": this._cy } ); }};function SlideMenuChild(_cy){ this._cy=_cy; }SlideMenuChild.prototype= {select:function (){var _co2=this.getSlideMenu(); var _co4=_co2._cO4(); var _cl4=_co4.selectedId; if (_ci4!=this._cy){if (!this.getSlideMenu()._cI1("OnBeforeSelect", { "ItemId": this._cy } ))return; if (_cl4!=""){var _ci4=new SlideMenuChild(_cl4); _ci4.unselect(); }var _cI4=_cI(_cY(this._cy)); _cv(_cI4,"ksmSelected"); _co4.selectedId=this._cy; _co2._co5(_co4); this.getSlideMenu()._cI1("OnSelect", { "ItemId": this._cy } ); }} ,unselect:function (){var _co2=this.getSlideMenu(); var _co4=_co2._cO4(); var _cl4=_co4.selectedId; if (_cl4==this._cy){if (!this.getSlideMenu()._cI1("OnBeforeUnselect", { "ItemId": this._cy } ))return; var _cI4=_cI(_cY(this._cy)); _cS(_cI4,"ksmSelected"); _co4.selectedId=this._cy; _co2._co5(_co4); this.getSlideMenu()._cI1("OnUnselect", { "ItemId": this._cy } ); }} ,_cO5:function (){var _cI4=_cI(_cY(this._cy)); return (_cs("smSelected",_cE(_cI4))>0); } ,getSlideMenu:function (){var _co3=_cY(this._cy); while (_cs("KSM",_cE(_co3))<0){_co3=_ca(_co3); }return eval(_co3.id); } ,getParentId:function (){var _co3=_ca(_cY(this._cy)); while (_cs("smParent",_cE(_cI(_co3)))<0){_co3=_ca(_co3); }return _co3.id; } ,_cO3:function (_cl3){if (this.getSlideMenu()._cl5){if (!this._cO5()){ this.select(); }}} ,_ci3:function (_cl3){ this.getSlideMenu()._cI1("OnChildMouseOver", { "ItemId": this._cy } ); } ,_cI3:function (_cl3){ this.getSlideMenu()._cI1("OnChildMouseOut", { "ItemId": this._cy } ); }};function SlideMenuPanel(_cy){ this._cy=_cy; }SlideMenuPanel.prototype= {getSlideMenu:function (){var _co3=_cY(this._cy); while (_cs("KSM",_cE(_co3))<0){_co3=_ca(_co3); }return eval(_co3.id); } ,getParentId:function (){var _co3=_ca(_cY(this._cy)); while (_cs("smParent",_cE(_cI(_co3)))<0){_co3=_ca(_co3); }return _co3.id; }};function KoolSlideMenu(_cy,_cl5,_cI2,_cO2,_cc,_ci5){ this._cy=_cy; this._cO2=_cO2; this._cc=_cc; this._cI2=_cI2; this._cl5=_cl5; this._cI5=new Array(); _cY(_cy+".clientState").value=_ci5; this._co6(); }KoolSlideMenu.prototype= {_co6:function (){var _co2=_cY(this._cy); var _cO6=_co2.getElementsByTagName("li"); for (var i=0; i<_cO6.length; i++){if (_cs("smLI",_cE(_cO6[i]))>0){var _cI4=_cI(_cO6[i]); if (_cs("smParent",_cE(_cI4))>0 || _cs("smChild",_cE(_cI4))>0){_cQ(_cI4,"click",_cl6, false); _cQ(_cI4,"mouseover",_ci6, false); _cQ(_cI4,"mouseout",_cI6, false); }}}} ,_cO4:function (){var _co7=_cY(this._cy+".clientState"); var _cO7=eval("__="+_co7.value); return _cO7; } ,_co5:function (_cO7){var _co7=_cY(this._cy+".clientState"); _co7.value=_cL(_cO7); } ,collapseAll:function (){var _co2=_cY(this._cy); var _cO6=_co2.getElementsByTagName("li"); for (var i=0; i<_cO6.length; i++){if (_cs("smLI",_cE(_cO6[i]))>0){if (_cs("smParent",_cE(_cI(_cO6[i])))>0){var _ci2=new SlideMenuParent(_cO6[i].id); if (_ci2.isExpanded()){_ci2.collapse(); }}}}} ,expandAll:function (){var _co2=_cY(this._cy); var _cO6=_co2.getElementsByTagName("li"); for (var i=0; i<_cO6.length; i++){if (_cs("smLI",_cE(_cO6[i]))>0){if (_cs("smParent",_cE(_cI(_cO6[i])))>0){var _ci2=new SlideMenuParent(_cO6[i].id); if (!_ci2.isExpanded()){_ci2.expand(); }}}}} ,getItem:function (_cl7){var _cT=_cE(_cI(_cY(_cl7))); var _ci7=null; if (_cs("smParent",_cT)>0){_ci7=new SlideMenuParent(_cl7); }else if (_cs("smChild",_cT)>0){_ci7=new SlideMenuChild(_cl7); }else if (_cs("smPanel",_cT)>0){_ci7=new SlideMenuPanel(_cl7); }return _ci7; } ,getSelectedId:function (){return this._cO4().selectedId; } ,registerEvent:function (_cK,_cI7){if (!_cr())this._cI5[_cK]=_cI7; else return true; } ,_cI1:function (_cK,_co8){if (_cr())return true; return (_cO(this._cI5[_cK]))?this._cI5[_cK](this,_co8): true; }};function _cl6(_cl3){if (_cs("smChild",_cE(this ))>0){var _ci7=new SlideMenuChild(_ca(this ).id); }else {var _ci7=new SlideMenuParent(_ca(this ).id); }_ci7._cO3(_cl3); }function _ci6(_cl3){if (_cs("smChild",_cE(this ))>0){var _ci7=new SlideMenuChild(_ca(this ).id); }else {var _ci7=new SlideMenuParent(_ca(this ).id); }_ci7._ci3(_cl3); }function _cI6(_cl3){if (_cs("smChild",_cE(this ))>0){var _ci7=new SlideMenuChild(_ca(this ).id); }else {var _ci7=new SlideMenuParent(_ca(this ).id); }_ci7._cI3(_cl3); }if (typeof(__KSMInits)!="undefined" && _cO(__KSMInits)){for (var i=0; i<__KSMInits.length; i++){__KSMInits[i](); }} <?php _cO7(); _clq(); } if (!class_exists("\113ool\123\154ide\115\145nu",FALSE)) { function _clr($_cls,$_cOs) { $_clt=""; foreach ($_cls->childNodes as $_cOt) { $_clt.=$_cOs->savexml($_cOt); } return trim($_clt); } class slidemenuparent { var $id; var $text; var $link; var $target; var $title; var $expand=FALSE; var $parent; var $_clu=array(); var $_cOu=-1; function __construct($_clv) { $this->id =$_clv; } function addchild($_cOv) { array_push($this->_clu ,$_cOv); $_cOv->parent =$this; if (strtolower(get_class($_cOv)) == "sli\144\145men\165\160are\156\164") { $_cOv->_cOu =$this->_cOu +1; } } } class slidemenuchild { var $id; var $text; var $link; var $target; var $parent; var $title; var $_clw=FALSE; function __construct($_clv) { $this->id =$_clv; } } class slidemenupanel { var $id; var $content; function __construct($_clv) { $this->id =$_clv; } } class koolslidemenu { var $_cl0="1\0566.0.0"; var $id; var $styleFolder; var $scriptFolder=""; var $singleExpand; var $boxHeight=-1; var $slidingSpeed=5; var $scrollEnable=FALSE; var $width="a\165\164o"; var $selectedId; var $_cOw=TRUE; var $_cO5; var $_clx; var $_cOx; function __construct($_clv) { $this->id =$_clv; $this->_cO5 =new slidemenuparent("ro\157\164"); $this->_clx =array(); $this->_clx["root"]=$this->_cO5; } function loadxml($_cly) { if (gettype($_cly) == "\163tr\151\156g") { $_cOy=new domdocument(); $_cOy->loadxml($_cly); $_cly=$_cOy->documentElement; } $_clv=$_cly->getattribute("\151\144"); if ($_clv != "") $this->id =$_clv; $_clz=$_cly->getattribute("\163tyl\145\106old\145\162"); if ($_clz != "") $this->styleFolder =$_clz; $_cOz=$_cly->getattribute("\163\143rip\164\106old\145\162"); if ($_cOz != "") $this->scriptFolder =$_cOz; $_cl10=strtolower($_cly->getattribute("si\156\147leE\170\160and")); if ($_cl10 != "") $this->singleExpand =($_cl10 == "\164rue") ? TRUE: FALSE; $_cO10=$_cly->getattribute("boxH\145\151ght"); if ($_cO10 != "") $this->boxHeight =intval($_cO10); $_cl11=$_cly->getattribute("\163\154idi\156\147Spe\145\144"); if ($_cl11 != "") $this->slidingSpeed =intval($_cl11); $_cO11=strtolower($_cly->getattribute("scro\154\154Ena\142\154e")); if ($_cO11 != "") $this->scrollEnable =($_cO11 == "tru\145") ? TRUE: FALSE; $_cl12=$_cly->getattribute("width"); if ($_cl12 != "") $this->width =$_cl12; $_cO12=$_cly->getattribute("selec\164\145dId"); if ($_cO12 != "") $this->selectedId =$_cO12; $this->_cl13($this->_cO5 ,$_cly,$_cly->parentNode); } function _cl13($_cO13,$_cl14,$_cOy) { foreach ($_cl14->childNodes as $_cO14) { switch (strtolower($_cO14->nodeName)) { case "\160\141ren\164": $_clv=$_cO14->getattribute("id"); $_cl3=$_cO14->getattribute("t\145\170t"); $_cl15=$_cO14->getattribute("li\156\153"); $_cO15=$_cO14->getattribute("tar\147\145t"); $_cl16=$_cO14->getattribute("ti\164\154e"); $_cO16=(strtolower($_cO14->getattribute("\145xpa\156\144")) == "true") ? TRUE: FALSE; $_cl17=$this->addparent($_cO13->id ,$_clv,$_cl3,$_cl15,$_cO16); $_cl17->target =$_cO15; $_cl17->title =$_cl16; $this->_cl13($_cl17,$_cO14,$_cOy); break; case "child": $_clv=$_cO14->getattribute("id"); $_cl3=$_cO14->getattribute("\164\145xt"); $_cl15=$_cO14->getattribute("lin\153"); $_cO15=$_cO14->getattribute("\164arg\145\164"); $_cl16=$_cO14->getattribute("\164itle"); $_cO17=$this->addchild($_cO13->id ,$_clv,$_cl3,$_cl15); $_cO17->target =$_cO15; $_cO17->title =$_cl16; break; case "pan\145\154": $_clv=$_cO14->getattribute("id"); $_cl18=_clr($_cO14,$_cOy); $this->addpanel($_cO13->id ,$_clv,$_cl18); break; } } } function addparent($_cO18,$_clv,$_cl3="",$_cl15="",$_cO16=FALSE) { $_cl19=new slidemenuparent($_clv); $_cl19->text =$_cl3; $_cl19->expand =$_cO16; $_cl19->link =($_cl15 == NULL || $_cl15 == "") ? "javas\143\162ipt\072\166oi\144\0400": $_cl15; $this->_clx[$_cO18]->addchild($_cl19); $this->_clx[$_clv]=$_cl19; return $_cl19; } function addchild($_cO18,$_clv,$_cl3="",$_cl15="") { $_cl19=new slidemenuchild($_clv); $_cl19->text =$_cl3; $_cl19->link =($_cl15 == NULL || $_cl15 == "") ? "javas\143\162ipt\072\166oi\144\0400": $_cl15; $this->_clx[$_cO18]->addchild($_cl19); $this->_clx[$_clv]=$_cl19; return $_cl19; } function addpanel($_cO18,$_clv,$_cl18) { $_cl19=new slidemenupanel($_clv); $_cl19->content =$_cl18; $this->_clx[$_cO18]->addchild($_cl19); $this->_clx[$_clv]=$_cl19; return $_cl19; } function getitem($_clv) { return $this->_clx[$_clv]; } function _cO19() { $this->styleFolder =_cO4("\134","/",$this->styleFolder); $_clz=trim($this->styleFolder ,"/"); $_cl1a=strrpos($_clz,"/"); $this->_cOx =substr($_clz,($_cl1a ? $_cl1a: -1)+1); } function registercss() { $this->_cO19(); $_cO1a="<s\143\162ipt\040\164yp\145\075't\145\170t/j\141\166as\143\162ip\164\047>\151\146 (d\157\143um\145nt.g\145tEle\155\145nt\102yId\050'__\173\163ty\154\145}K\123\115'\051\075=\156\165ll\051\173v\141\162 _\150ead\040\075 \144\157c\165\155en\164.ge\164\105l\145\155e\156\164s\102\171Ta\147Nam\145('h\145ad'\051[0]\073var\040_l\151\156k\040\075 \144ocu\155ent\056cr\145\141t\145\105l\145men\164('l\151nk\047); \137lin\153.i\144\040=\040'_\137\173s\164yl\145\175K\123M';\137li\156k.r\145l=\047st\171\154e\163he\145\164'\073 \137\154i\156k.\150\162e\146='\173st\171\154e\160at\150}/\173st\171\154e\175/\173\163t\171\154e\175.c\163s'\073_h\145ad\056ap\160en\144Ch\151ld\050_l\151nk\051;\175</\163cr\151pt\076"; $_cl1b=_cO4("\173\163tyl\145\175",$this->_cOx ,$_cO1a); $_cl1b=_cO4("\173st\171\154epa\164\150}",$this->_cO1b(),$_cl1b); return $_cl1b; } function render() { $_cl1b="\n<!\055\055Ko\157\154Sli\144\145Me\156\165 ve\162\163io\156\040".$this->_cl0."\040- w\167\167.ko\157\154php.\156\145t \055\055>\n"; $_cl1b.=$this->registercss(); $_cl1b.=$this->renderslidemenu(); $_cl1c= isset ($_POST["__k\157\157laj\141\170"]) || isset ($_GET["__\153\157olaj\141\170"]); $_cl1b.=($_cl1c) ? "": $this->registerscript(); $_cl1b.="<scri\160\164 ty\160\145='t\145\170t/j\141\166asc\162\151pt\047\076"; $_cl1b.=$this->startupscript(); $_cl1b.="</\163\143rip\164\076"; return $_cl1b; } function renderslidemenu() { $tpl_bound="\173\142oun\144\143ont\145\156t}"; $tpl_parent="<d\151\166 cla\163\163='k\163\155In\047\076\173\160\141re\156\164co\156\164en\164\175</\144\151v>"; $tpl_childbox="\173chi\154\144box\143\157nte\156\164}"; $tpl_child="\074\163pan\040\143la\163\163='k\163\155In'\076\173ch\151\154dc\157\156te\156\164}<\057\163pa\156\076"; $tpl_panel="\074div c\154\141ss=\047\153smI\156\047>\173\160anel\143\157nt\145\156t}\074\057d\151\166>"; $this->_cO19(); include "\163tyle\163"."\057".$this->_cOx."\057".$this->_cOx.".t\160\154"; $_cO1c="\074ul cl\141\163s='\153\163mUL\040\173bo\170\110eig\150\164}'\076\173p\141\162en\164\163}<\057\165l>"; $_cl1d="\074styl\145\040rel\075\047st\171\154esh\145\145t'>\040.\173s\164\171l\145\175KSM\040.ksm\102\157xH\145\151gh\164\040.\153\163mC\150ild\102\157x \173\150ei\147\150t:\173\142o\170\110ei\147\150t}\160x;o\166\145rf\154\157w\072\173o\166\145rf\154ow}\073\175 \074/st\171le>"; $_cOi=_cO4("\173\164pl_bo\165\156d}",$tpl_bound,_cOf()); $_cOi=_cO4("\173id}",$this->id ,$_cOi); $_cOi=_cO4("\173\167idth}",$this->width ,$_cOi); $_cOi=_cO4("\173\163tyle\175",$this->_cOx ,$_cOi); $_cl19=$this->_cO5; $_cO1d=""; for ($_cOb=0; $_cOb<sizeof($_cl19->_clu); $_cOb ++) { $_cO1d.=$this->_cl1e($_cl19->_clu[$_cOb]); } $_cO1e=_cO4("\173\160\141rent\163\175",$_cO1d,$_cO1c); if ($this->boxHeight <0) { $_cO10=""; $_cO1e=_cO4("\173\142\157xHe\151\147ht}","",$_cO1e); } else { $_cO10=_cO4("\173\163tyle}",$this->_cOx ,$_cl1d); $_cO10=_cO4("\173\142oxHeig\150\164}",$this->boxHeight ,$_cO10); $_cO10=_cO4("\173\157\166erf\154\157w}",($this->scrollEnable) ? "auto": "\150\151dden",$_cO10); $_cO1e=_cO4("\173\142\157xHei\147\150t}","\153smBox\110\145igh\164",$_cO1e); } if (_cOh($_cOi)) { $_cOi=_cO4("\173boun\144\143ont\145\156t}",$_cO1e,$_cOi); } $_cOi=_cO4("\173\166\145rsio\156\175",$this->_cl0 ,$_cOi); $_cOi=_cO4("\173\142oxHe\151\147ht}",$_cO10,$_cOi); return $_cOi; } function _cl1e($_cl19) { $tpl_bound="\173\142ound\143\157nte\156\164}"; $tpl_parent="\074div\040\143las\163\075'ks\155\111n'>\173\160ar\145\156tco\156tent\175\074/d\151\166>"; $tpl_childbox="\173c\150\151ldb\157\170con\164\145nt}"; $tpl_child="\074sp\141\156 cla\163\163='k\163\155In'\076\173ch\151\154dc\157\156te\156\164}<\057\163pa\156\076"; $tpl_panel="<div \143\154ass\075\047ks\155\111n'>\173\160an\145\154con\164\145n\164\175</d\151\166>"; include "\163\164yle\163"."/".$this->_cOx."/".$this->_cOx.".t\160\154"; $_cl1b=""; $_cl1f=""; if ($_cl19 === $_cl19->parent->_clu[0]) { $_cl1f="\153\163mFi\162\163t"; } else if ($_cl19 === $_cl19->parent->_clu[sizeof($_cl19->parent->_clu)-1]) { $_cl1f="\153\163mLa\163\164"; } switch (strtolower(get_class($_cl19))) { case "slid\145\155enup\141\162ent": $_cO1f="<\154\151 id\075\047\173\151\144}'\040\143las\163\075'k\163\155LI\040\153sm\114\145ve\154\173le\166\145l}\040\173c\157\154la\160se}\040\173po\163\175'>\173\160a\162\145nt\143\157nt\145\156t\175\173ch\151ldbo\170}</\154\151>"; $_cl1g="<a\040\143la\163\163='ks\155\101 k\163\155Par\145\156t'\040\150re\146\075'\173\154ink\175\047 \173\164ar\147\145t}\040\173ti\164le}\040\076\173\164pl_\160\141re\156\164}<\057a>"; $_cO1g="<d\151\166 cla\163\163='k\163\155Ch\151\154dBo\170\047>\173\164pl_\143\150il\144\142ox\175\074/\144\151v>"; $_cl1h="\074\165l c\154\141ss=\047\153sm\125\114'>\173\143hil\144\162en\175\074/u\154\076"; $_cO1h=_cO4("\173\164pl_p\141\162ent\175",$tpl_parent,$_cl1g); $_cO1h=_cO4("\173\160arent\143\157nten\164\175",$_cl19->text ,$_cO1h); $_cO1h=_cO4("\173\154in\153\175",$_cl19->link ,$_cO1h); $_cO1h=_cO4("\173ta\162\147et}",($_cl19->target != NULL) ? "targ\145\164='".$_cl19->target."\047": "",$_cO1h); $_cO1h=_cO4("\173\164itle\175",($_cl19->title != NULL) ? "tit\154\145='".$_cl19->title."'": "",$_cO1h); $_clu=""; for ($_cOb=0; $_cOb<sizeof($_cl19->_clu); $_cOb ++) { $_clu.=$this->_cl1e($_cl19->_clu[$_cOb]); } $_cl1i=""; if ($_clu != "") { $_cO1i=_cO4("\173\143hild\162\145n}",$_clu,$_cl1h); $_cl1i=_cO4("\173t\160\154_ch\151\154dbo\170\175",$tpl_childbox,$_cO1g); $_cl1i=_cO4("\173\143hild\142\157xco\156\164ent\175",$_cO1i,$_cl1i); } $_cl1b=_cO4("\173pare\156\164con\164\145nt}",$_cO1h,$_cO1f); $_cl1b=_cO4("\173\143hildb\157\170}",$_cl1i,$_cl1b); $_cl1b=_cO4("\173\151d}",$_cl19->id ,$_cl1b); $_cl1b=_cO4("\173l\145\166el}",$_cl19->_cOu ,$_cl1b); $_cl1b=_cO4("\173p\157\163}",$_cl1f,$_cl1b); $_cl1b=_cO4("\173\143olla\160\163e}",($_cl19->expand) ? "": "\153smCo\154\154aps\145",$_cl1b); break; case "\163\154idem\145\156uch\151\154d": $_cl1j="\074li i\144\075'\173\151\144}'\040\143las\163\075'k\163\155LI\040\173po\163\175'>\074a cl\141\163s=\047ksm\101\040ks\155\103hi\154d \173\163ele\143\164ed\175\047 \150\162ef\075\047\173\154ink\175\047 \173\164ar\147et}\040\173t\151\164le\175 >\173\164pl_\143hil\144}</\141\076<\057li>"; $_cl1b=_cO4("\173t\160\154_ch\151\154d}",$tpl_child,$_cl1j); $_cl1b=_cO4("\173chil\144\143ont\145\156t}",$_cl19->text ,$_cl1b); $_cl1b=_cO4("\173l\151\156k}",$_cl19->link ,$_cl1b); $_cl1b=_cO4("\173\164\141rge\164\175",($_cl19->target != NULL) ? "\164\141rge\164\075'".$_cl19->target."\047": "",$_cl1b); $_cl1b=_cO4("\173title\175",($_cl19->title != NULL) ? "\164itle=\047".$_cl19->title."\047": "",$_cl1b); $_cl1b=_cO4("\173\151\144}",$_cl19->id ,$_cl1b); $_cl1b=_cO4("\173\160os}",$_cl1f,$_cl1b); $_cl1b=_cO4("\173\163\145lec\164\145d}",($this->selectedId == $_cl19->id) ? "\153\163mSe\154\145cte\144": "",$_cl1b); break; case "sli\144\145menu\160\141nel": $_cO1j="\074li i\144\075'\173\151\144}'\040\143la\163\163='k\163\155LI\040ksmP\141\156el\040\173p\157\163}'\076\173tp\154\137pa\156\145l\175\074/\154\151>"; $_cl1b=_cO4("\173\164pl_\160\141nel\175",$tpl_panel,$_cO1j); $_cl1b=_cO4("\173p\141\156elco\156\164ent\175",$_cl19->content ,$_cl1b); $_cl1b=_cO4("\173\151\144}",$_cl19->id ,$_cl1b); $_cl1b=_cO4("\173pos}",$_cl1f,$_cl1b); break; } return $_cl1b; } function registerscript() { $_cO1a="\074sc\162\151pt t\171\160e='\164\145xt\057\152ava\163\143ri\160\164'>\151\146(t\171\160eo\146\040_\154\151bK\123\115=='\165nde\146\151ne\144\047)\173\144oc\165\155en\164.wr\151\164e(\165\156es\143ape\050\042%\063\103s\143\162ip\164 ty\160\145=\047\164e\170\164/\152\141va\163cri\160\164'\040src\075'\173\163rc}\047%3E\040%3C\057scr\151pt%\063E\042\051);\137lib\113SM=\061;}<\057sc\162\151p\164>"; $_cl1b=_cO4("\173\163rc}",$this->_cl1k()."\077".md5("js"),$_cO1a); return $_cl1b; } function startupscript() { $_cO1a="v\141\162 \173\151\144}; \146\165nct\151\157n \173\151d}_\151\156it\050)\173\040\173id\175\040= \156\145w \113\157ol\123lide\115enu\050\047\173\151d}'\054\173se\154ect\105\156ab\154\145},\173\163l\151\144in\147\123p\145\145d}\054\173s\151\156g\154\145Ex\160and\175,\173\142\157x\110\145ig\150t},\042\173c\154ien\164Sta\164e}\042\051;}"; $_cO1a.="if \050\164ype\157\146(Ko\157\154Sli\144\145Me\156\165)==\047func\164ion'\051\173\173\151d}_i\156it()\073}"; $_cO1a.="e\154\163e\173\151f(typ\145\157f(_\137\113SMI\156\151ts\051\075=\047\165nd\145\146in\145\144')\173\137_K\123\115In\151\164s=\156ew \101\162ra\171\050);\175\040_\137\113SM\111nits\056pus\150\050\173\151d}_\151\156i\164\051;\173\162eg\151\163t\145\162_s\143rip\164\175}"; $_cO1k="if(t\171\160eof\050\137lib\113\123M)=\075\047u\156\144efi\156\145d'\051\173va\162\040_h\145\141d \075 do\143\165me\156\164.g\145\164El\145ment\163\102yT\141\147N\141\155e(\047hea\144\047)[\060];v\141\162 _\163cri\160\164 =\040doc\165\155e\156\164.c\162eat\145\105l\145\155e\156\164('\163cri\160t')\073 _s\143\162i\160\164.\164\171p\145\075'\164\145x\164\057j\141vas\143rip\164'; \137scr\151pt.\163rc\075\047\173\163rc\175';\040_he\141d.a\160pe\156\144C\150il\144\050_\163cri\160t)\073_l\151\142K\123M=\061;}"; $_cl1l=_cO4("\173s\162\143}",$this->_cl1k()."?".md5("js"),$_cO1k); $_cO1l="\173\047\163elec\164\145dId\047\072'\173\163ele\143\164edI\144\175'}"; $_cl1b=_cO4("\173\151d}",$this->id ,$_cO1a); $_cl1b=_cO4("\173sin\147\154eEx\160\141nd}",($this->singleExpand) ? "1": "\060",$_cl1b); $_cl1b=_cO4("\173sel\145\143tEna\142\154e}",($this->_cOw) ? "\061": "\060",$_cl1b); $_cl1b=_cO4("\173slidi\156\147Spe\145\144}",$this->slidingSpeed ,$_cl1b); $_cl1b=_cO4("\173\142ox\110\145ight\175",$this->boxHeight ,$_cl1b); $_cl1m=_cO4("\173s\145\154ect\145\144Id}",$this->selectedId ,$_cO1l); $_cl1b=_cO4("\173clien\164\123tate\175",$_cl1m,$_cl1b); $_cl1b=_cO4("\173r\145\147ist\145\162_sc\162\151pt}",$_cl1l,$_cl1b); return $_cl1b; } function _cl1k() { if ($this->scriptFolder == "") { $_cO5=_cO3(); $_cO1m=substr(_cO4("\134","/",__FILE__),strlen($_cO5)); return $_cO1m; } else { $_cO1m=_cO4("\134","\057",__FILE__); $_cO1m=$this->scriptFolder.substr($_cO1m,strrpos($_cO1m,"\057")); return $_cO1m; } } function _cO1b() { $_cl1n=$this->_cl1k(); $_cO1n=_cO4(strrchr($_cl1n,"\057"),"",$_cl1n)."/st\171\154es"; return $_cO1n; } } } ?>