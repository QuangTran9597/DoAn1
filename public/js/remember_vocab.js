const list_words = document.querySelectorAll('.list-word');
    const lists = document.querySelectorAll('.caption-background');

    let draggedItem = null;

    for (let i = 0; i < list_words.length; i++ ) {
        const word = list_words[i];

        word.addEventListener('dragstart', function()
        {   console.log('start');
            draggedItem = word;
            setTimeout(function(){
                word.style.display = 'none';
            }, 0)

        });

        word.addEventListener('dragend', function()
        {   console.log('end');
            setTimeout(function()
            {
                draggedItem.style.display = 'block';
                draggedItem = null;
            }, 0);
        })

        for(let j = 0; j < lists.length; j++) {
            const list = lists[j];

            list.addEventListener('dragover', function(e)
            {
                e.preventDefault();
            });

            list.addEventListener('dragenter', function(e)
            {
                e.preventDefault();
                this.style.backgroundColor = 'rbga(0, 0, 0, 0.4)';
            });

            list.addEventListener('dragleave', function(e)
            {   console.log('dragleave')
                this.style.backgroundColor = 'rbga(0, 0, 0, 0.4)';
            });

            list.addEventListener('drop', function()
            {
                console.log('drop');
                list.append(draggedItem);
                this.style.backgroundColor = 'rbga(0, 0, 0, 0.4)';

            });

        }
    }

// const list_word = document.querySelectorAll('.list-word');
// const lists = document.querySelectorAll('.list');

// //List-word Listeners

// list_word.addEventListener('dragstart', dragStart);
// list_word.addEventListener('dragend', dragEnd);

// // Drag Function
// function dragStart() {
//     console.log('start');
// }

// function dragEnd() {
//     console.log('end');
// }
