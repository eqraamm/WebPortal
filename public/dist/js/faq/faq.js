$(function () {
   for (i=0; i < dataFAQ.length; i++){
      createListFAQ(dataFAQ[i]['FAQID'],dataFAQ[i]['Question'],dataFAQ[i]['Answer'],dataFAQ[i]['CategoryDesc']);
   }
});

function createListFAQ(faqid,question, answer, category){
   var divCard = document.createElement("div");
   divCard.setAttribute('class','card card-primary');

   //anchor for accordion
   var anchor = document.createElement('a');
   anchor.setAttribute('class','d-block w-100');
   anchor.setAttribute('data-toggle','collapse');
   anchor.setAttribute('href','#' + faqid);

   //diiv card header
   var divCardHeader = document.createElement("div");
   divCardHeader.setAttribute('class','card-header');

   //header card title for question
   var h4 = document.createElement('h4');
   h4.setAttribute('class','card-title w-100');
   h4.innerHTML = category + ' - ' + question;

   divCardHeader.appendChild(h4);
   anchor.appendChild(divCardHeader);
   divCard.appendChild(anchor);

   //div accordion body for answer
   var divAccordionBody = document.createElement("div");
   divAccordionBody.setAttribute('id',faqid);
   divAccordionBody.setAttribute('class','collapse');
   divAccordionBody.setAttribute('data-parent','#accordion');

   //div Card Body
   var divCardBody = document.createElement("div");
   divCardBody.setAttribute('class','card-body');
   divCardBody.innerHTML = answer;

   divAccordionBody.appendChild(divCardBody);

   divCard.appendChild(divAccordionBody);

   var divAccordion = document.getElementById('accordion');
   divAccordion.appendChild(divCard);
}