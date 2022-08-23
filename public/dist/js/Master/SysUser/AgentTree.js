// const { first } = require("lodash");

var dataAgent = [
   {
      "ID":"000000",
      "Name":"Meliodas",
      "Level" : "MP",
      "LevelDesc" : "Managing Partner",
      "ULAgentID" : ""
   },
   {
      "ID":"111",
      "Name":"Ekram",
      "Level" : "MP",
      "LevelDesc" : "Managing Partner",
      "ULAgentID" : "000000"
   },
   {
      "ID":"222",
      "Name":"Fitri",
      "Level" : "SP",
      "LevelDesc" : "Senior Partner",
      "ULAgentID" : "000000"
   },
   {
      "ID":"333",
      "Name":"Alesha",
      "Level" : "EP",
      "LevelDesc" : "Executive Partner",
      "ULAgentID" : "000000"
   },
   {
      "ID":"444",
      "Name":"Luffy",
      "Level" : "P",
      "LevelDesc" : "Partner",
      "ULAgentID" : "000000"
   },
   {
      "ID":"555",
      "Name":"Zoro",
      "Level" : "P",
      "LevelDesc" : "Partner",
      "ULAgentID" : "000000"
   },
   {
      "ID":"101",
      "Name":"Adit",
      "Level" : "MP",
      "LevelDesc" : "Managing Partner",
      "ULAgentID" : "111"
   },
   {
      "ID":"102",
      "Name":"Calvin",
      "Level" : "SP",
      "LevelDesc" : "Senior Partner",
      "ULAgentID" : "111"
   },
   {
      "ID":"103",
      "Name":"Abdi",
      "Level" : "EP",
      "LevelDesc" : "Executive Partner",
      "ULAgentID" : "111"
   },
   {
      "ID":"104",
      "Name":"Riko",
      "Level" : "P",
      "LevelDesc" : "Partner",
      "ULAgentID" : "111"
   },
   {
      "ID":"201",
      "Name":"Yuni",
      "Level" : "P",
      "LevelDesc" : "Partner",
      "ULAgentID" : "222"
   },
   {
      "ID":"F001",
      "Name":"Fahmi",
      "Level" : "P",
      "LevelDesc" : "Partner",
      "ULAgentID" : "103"
   },
   {
      "ID":"W001",
      "Name":"Wahyu",
      "Level" : "P",
      "LevelDesc" : "Partner",
      "ULAgentID" : "103"
   }
   
];
var listDownlineID = [];

function createChildTree(id, name, level, levelDesc, firstLayerF, ULAgentID){
   var dataDownline = dataAgent.filter(data => data.ULAgentID == id);
   var dropDownMenu = !firstLayerF && dataDownline.length > 0;
   var firstLevelMenu = firstLayerF && (ULAgentID != '' || ULAgentID == undefined);
   var showMenuDropdown = dropDownMenu || firstLevelMenu;

   //Column Agent Name & Level
   var divColAgentName = document.createElement('div');
   divColAgentName.setAttribute('class',firstLayerF ? 'col-sm-12 d-flex justify-content-center parent-dropdown' : 'col-sm-3 parent-dropdown');

   //div card agent tree
   var divCardAgent = document.createElement('div');
   divCardAgent.setAttribute('class','card card-tree card-' + id);
   if (showMenuDropdown){
      divCardAgent.setAttribute('oncontextmenu','showContextMenu(event,this,"'+ id +'")');
   }
   // if (showMenuDropdown){
   //    divCardAgent.setAttribute('data-toggle','dropdown');
   // }

   //div card body agent tree
   var divCardBodyAgent = document.createElement('div');
   divCardBodyAgent.setAttribute('class','card-body');

   //row card body agent Name
   var divRowCardBodyName = document.createElement('div');
   divRowCardBodyName.setAttribute('class','row align-items-center');

   //column card body agent Name
   var divColCardBodyName = document.createElement('div');
   divColCardBodyName.setAttribute('class','col-md-12 d-flex justify-content-center');

   //label Name
   var labelName = document.createElement('label');
   labelName.setAttribute('class','card-title text-center text-truncate');
   labelName.innerHTML = name;

   //column card body agent Level
   var divColCardBodyLevel = document.createElement('div');
   divColCardBodyLevel.setAttribute('class','col-md-12 d-flex justify-content-center');

   //p level
   var pLevel = document.createElement('p');
   pLevel.setAttribute('class','card-text');
   pLevel.innerHTML = '(' + levelDesc + ')';

   //row card body btn expand
   var divRowCardBodyBtnExpand = document.createElement('div');
   divRowCardBodyBtnExpand.setAttribute('class','row align-items-center');

   //column card body btn expand
   var divColCardBodyBtnExpand = document.createElement('div');
   divColCardBodyBtnExpand.setAttribute('class','col-md-12 d-flex justify-content-center');

   //anchor btn expand
   var anchorBtnExpand = document.createElement('a');
   if (dataDownline.length > 0){
      anchorBtnExpand.href = "#";
   }
   anchorBtnExpand.id = 'a-' + id;
   anchorBtnExpand.setAttribute('onClick','loadDownline("'+ id +'");');

   //icon btn expand
   var iconBtnExpand = document.createElement('i');
   iconBtnExpand.setAttribute('class','fas fa-angle-right');
   iconBtnExpand.setAttribute('style',dataDownline.length > 0 ? 'transition: transform .4s;' : 'transition: transform .4s; opacity:0;');

   //parent dropmenu
   // var divDropMenuParent = document.createElement('div');
   // divDropMenuParent.setAttribute('id','dropDownMenu-' + id);

   //dropdownmenu
   var divDropDownMenu = document.createElement('div');
   divDropDownMenu.setAttribute('class','dropdown-menu');

   //anchor menu
   var anchorMenu = document.createElement('a');
   anchorMenu.setAttribute('class','dropdown-item');
   anchorMenu.setAttribute('href','#');
   if (firstLevelMenu){
      anchorMenu.setAttribute('onclick','moveToPreviousAgent("'+ ULAgentID +'")');
      anchorMenu.innerHTML = "Move to Previous Agent Level";
   }else if(dropDownMenu){
      anchorMenu.setAttribute('onclick','moveToFirstLevel("'+ id +'")');
      anchorMenu.innerHTML = "Move This Agent to First Level";
   }
   
   //block row btn expand
   anchorBtnExpand.appendChild(iconBtnExpand);
   divColCardBodyBtnExpand.appendChild(anchorBtnExpand);
   divRowCardBodyBtnExpand.appendChild(divColCardBodyBtnExpand);

   //block row agent name
   divColCardBodyLevel.appendChild(pLevel);
   divColCardBodyName.appendChild(labelName);
   divRowCardBodyName.appendChild(divColCardBodyName);
   divRowCardBodyName.appendChild(divColCardBodyLevel);

   //block card body
   divCardBodyAgent.appendChild(divRowCardBodyName);
   divCardBodyAgent.appendChild(divRowCardBodyBtnExpand);

   if (showMenuDropdown){
      //block dropdownmenu
      divDropDownMenu.appendChild(anchorMenu);
   }

   //block card
   divCardAgent.appendChild(divCardBodyAgent);
   if (showMenuDropdown){
      divCardAgent.appendChild(divDropDownMenu);
   }

   //block column agent tree
   divColAgentName.appendChild(divCardAgent);

   //block row agent tree
   // var divRowTree = document.getElementById('row-tree');
   // divRowTree.appendChild(divColAgentName);

   return divColAgentName;

}

async function rowTree(data,id, firstLayerF){
   //Agent Tree
   var agentTree = document.getElementById(firstLayerF ? 'first-layer' : 'agent-tree');
   
   //Row Agent Tree
   var divRowAgentTree = document.createElement('div');
   divRowAgentTree.setAttribute('class','ml-1 mt-1 row flex-nowrap');
   divRowAgentTree.setAttribute('id',id == '' ? 'row' : 'row-' + id);

   for (i=0; i < data.length; i++){
      var columnTree = createChildTree(data[i]['ID'], data[i]['Name'], data[i]['Level'], data[i]['LevelDesc'], firstLayerF, data[i]['ULAgentID']);
      divRowAgentTree.appendChild(columnTree);
   }
   agentTree.appendChild(divRowAgentTree);
   
   $('.parent-dropdown').on('hide.bs.dropdown', function(){
      $(this).children().removeAttr('data-toggle');
      $(this).children().dropdown('dispose');
   });
}

function loadDownline(id){
   // //Checking if already open downline in same layer
   // var dataAgentFix = dataAgent.filter(data => data.ID == id);
   // var dataULAgent = dataAgent.filter(data => data.ULAgentID == dataAgentFix[0]['ULAgentID']);
   // //end checking

   var dataFix = dataAgent.filter(data => data.ULAgentID == id);
   if (dataFix.length > 0){
      rowTree(dataFix,id, false);
      var rows = document.getElementById('row-' + id);
      rows.classList.remove('elementFadeOut');
      rows.classList.add('elementFadeIn');
      
      var btnExpand = document.getElementById('a-' + id);
      btnExpand.removeAttribute('onclick');
      btnExpand.setAttribute('onclick','closeDownline("'+ id +'")');
      var iconBtnExpand = btnExpand.children;
      iconBtnExpand[0].classList.add('fa-rotate-90');

      var card = document.querySelector('.card-' + id);
      card.classList.add('bg-success');
      arrDownlineID = {
         'id' : id
      };
      listDownlineID.push(arrDownlineID);
      // console.log(listDownlineID);
   }
}

function closeDownline(id){
   const index = listDownlineID.map(object => object.id).indexOf(id);
   for (i = index; i < listDownlineID.length; i++){
      var rows = document.getElementById('row-' + listDownlineID[i].id);
      rows.classList.remove('elementFadeIn');
      rows.classList.add('elementFadeOut');
      rows.remove();
   }
   
   var btnExpand = document.getElementById('a-' + id);
   btnExpand.removeAttribute('onclick');
   btnExpand.setAttribute('onclick','loadDownline("'+ id +'")');
   var iconBtnExpand = btnExpand.children;
   iconBtnExpand[0].classList.remove('fa-rotate-90');
   var card = document.querySelector('.card-' + id);
   card.classList.remove('bg-success');
   removeDownlineArray(listDownlineID,id);
   // console.log(listDownlineID);
}

$(function(){
   var dataFirstLayer = dataAgent.filter(data => data.ID == userid);
   rowTree(dataFirstLayer,'',true);
   loadDownline(userid);

   // var dataDownline = dataAgent.filter(data => data.ULAgentID == userid);
   // rowTree(dataDownline,'',false);
});

function removeDownlineArray(arr, value) {
   // var index = arr.indexOf(value);
   const index = arr.map(object => object.id).indexOf(value);
   if (index > -1) {
     arr.splice(index, arr.length);
   }
   return arr;
}

function moveToFirstLevel(id){
   listDownlineID = [];
   var dataFirstLayer = dataAgent.filter(data => data.ID == id);
   $('#first-layer').empty();
   $('#agent-tree').empty();
   rowTree(dataFirstLayer,'',true);
   loadDownline(id);
};

function moveToPreviousAgent(id){
   console.log(id)
   listDownlineID = [];
   var dataFirstLayer = dataAgent.filter(data => data.ID == id);
   console.log(dataFirstLayer);
   $('#first-layer').empty();
   $('#agent-tree').empty();
   rowTree(dataFirstLayer,'',true);
   loadDownline(id);
};

// $(document).click(function(){
//    $(".card-tree").dropdown('hide');
// });

function showContextMenu(event,element,id){
   event.preventDefault();
   var divCard = document.querySelector('.card-' + id);
   divCard.setAttribute('data-toggle','dropdown');
   $(element).dropdown('toggle');
}

