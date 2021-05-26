const list_images = document.querySelectorAll('.dragImage');
const list_audio = document.querySelectorAll('.image');

let draggedImage = null;

for(let i = 0 ; i < list_images.length; i++)
{
    const img = list_images[i];

    img.addEventListener('dragstart', function()
    {
       draggedImage = img;
       setTimeout(function()
       {
            img.style.display = 'none';
       }, 0);
    });

    img.addEventListener('dragend', function()
    {
        setTimeout(function()
        {
            draggedImage.style.display = 'block';
            draggedImage = null;
        }, 0);
    });


    for(let j = 0; j < list_audio.length; j++ )
    {
        const audioImage = list_audio[j];

        audioImage.addEventListener('dragover', function(e)
        {
            e.preventDefault();
        });

        audioImage.addEventListener('dragenter', function(e)
        {
            e.preventDefault();
            this.style.backgroundColor = 'rgba(0, 0, 0, 0.3)';
        });

        audioImage.addEventListener('dragleave', function(e)
        {
            this.style.backgroundColor = 'rgba(0, 0, 0, 0.3)';
        });

        audioImage.addEventListener('drop', function(e)
        {
            console.log('drop');
            this.append(draggedImage);
        });

    }

};



