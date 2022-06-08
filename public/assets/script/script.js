document.querySelector('.bars-menu').addEventListener('click', ()=>{
   if(document.querySelector('.body-aside').classList.contains('active'))  {
    document.querySelector('.body-aside').style.display = 'flex';
    document.querySelector('.body-aside').classList.remove('active');
    document.querySelector('.body-aside').classList.add('inative')

   } else if(document.querySelector('.body-aside').classList.contains('inative')) {
        document.querySelector('.body-aside').classList.remove('inative')
        document.querySelector('.body-aside').classList.add('active')
   }
});

document.querySelectorAll(".favorite-notice--icon i").forEach(item => {
   item.addEventListener('click', (e)=>{
      e.target.style.backgroundColor = '#555';
   })
});



if(document.querySelector('.body-comment')) {
   document.querySelectorAll('.body-comment').forEach(item=>{
       item.addEventListener('keyup', async (e)=>{
           if(e.keyCode == 13) {
               let id = item.closest('.feed-item').getAttribute('data-id');
               let txt = item.value;
               item.value = '';

               let data = new FormData();
               data.append('id', id);
               data.append('txt', txt);

               const BASE = '/aula/noticias_mvc/public'

               let req = await fetch(BASE+'/ajax/comment', {
                   method: 'POST',
                   body: data
               });
               let json = await req.json();

               if(json.error == '') {
                 
                  let html = '<div class="comments-body">';
                  html += '<div class="comments-content">';
                  html += '<div class="comment-avatar">';
                  html += '<a href="'+BASE+json.link+'"><img src="'+BASE+json.avatar+'" /></a>';
                  html += '</div>';
                  html += '<div class="comment-text-name">';
                  html += '<div class="comment-name">';
                  html += '<a href="'+BASE+json.link+'">'+json.name+'</a>';
                  html += '<div class="comment-date">';
                  html += json.date;
                  html += '</div>';
                  html += '</div>';
                  html += json.body;
                  html += '</div>';
                  html += '</div>';
                  html += '</div>';
                  

                  item.closest('.feed-item')
                      .querySelector('.comments-area')
                      .innerHTML += html;
              }

           }
       });
   });
}



