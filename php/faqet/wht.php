<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/wht.css">
</head>
<body>
<main>
    <br><br>
            <div class="left">
                <br><br><br>
                <h2 id="text6">Rabbit</h2>
                <img class="images" id="slideshow">
                <button id="bt1" onclick="changeImg()">Next</button>
            </div>
            <div class="right">
                <br><br><br><br><br><br><br>
                <div class="p-head1">The Enchanting World of Rabbits</div>
                <div class="p-head2">Domesticated rabbits, with their wide range of coat colors and patterns, have become beloved pets around the world. Their gentle and affectionate demeanor makes them ideal companions, bringing joy to households and showcasing their adaptability beyond the wild.</div>

                <br>

                <div class="p-head1">The Whimsical World of Bunnies</div>
                <div class="p-head2">Beyond their ecological significance, rabbits have burrowed their way into human folklore and symbolism. Often associated with fertility and rebirth, rabbits are featured prominently in myths and stories across cultures. The playful and fertile nature of these creatures has inspired tales of trickster rabbits and benevolent hare deities, showcasing their enduring impact on human imagination.</div>
                 <br>

                 <div class="p-head1">The Secret Lives of Rabbits: A Symphony of Whiskers and Meadows</div>
                 <div class="p-head2">In the hidden folds of meadows and under the dappled light of the forest canopy, a silent symphony unfolds—the secret lives of rabbits. These small, unassuming creatures possess a world of wonders, where every hop and twitch tells a story of survival, social bonds, and the dance of nature.</div>
            </div>
        </main>

        <script>

            let i=0;

            let imgArray = ['pht1.jpeg','pht2.jpeg','pht3.jpeg'];
            
            function changeImg(){
                document.getElementById('slideshow').src = imgArray[i];

                if(i<imgArray.length -1){
                    i++
                }
                else{
                    i=0;
                }
            }
            document.addEventListener(onload, changeImg());
        </script>
</body>
</html>