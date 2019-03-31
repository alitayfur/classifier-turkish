# CLASSIFIER CLASS WITH PHP

![classifier](photo/0_pcWOyypacfYbIdg6.png)

# Rated

![rated](photo/rated.png)

# Using

    $classifier = new classifier;
    $comment    = 'Mimarisini en cok begendigim otel denize bakan odalarda balkona ciktiginizda kendinizi bir crouse gemisinde yolculuk yapar gibi hissediyorsunuz. Odalar gayet kaliteli malzemeler kullanilarak dizayn edilmis hersey icin tesekkurler vikingen';
    $rate = $classifier->classify($comment);
    echo '(<b>'.$rate.'</b>/100)<img src="smile/'.$classifier->smile().'.png"> '.$comment;



# Shoot Screen

![photo_1](photo/1.png)
![photo_2](photo/2.png)
![photo_3](photo/3.png)
![photo_4](photo/4.png)