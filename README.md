
# musicless
Music search and download over vk.com

ITS REQUIRE VK.COM TOKEN!


files:
- **index.php** search and download methods
- **id3.php** generate id3 tag *(for artist and title)*

## Use
- ?**search**=**something**  - for search
`http://yousite.com/music?search=gorillaz` for search gorillaz

result example:
```
[{"id":456240017,"owner_id":371745452,"artist":"Gorillaz","title":"Feel Good Inc","duration":222,"date":1468593014,"url":"https:\/\/cs1-44v4.vkuseraudio.net\/p18\/4f4efbc45ca53f.mp3?extra=DQEeJ36Xxs5BB9jGNKcskKkZVRlwvqLW8rcS9xA6pADCQJG_-_2Eb5USJByrWQE98-YAui4Kn-5M1isFyLdeDbcP5My2RDxkhjRA08eZvvMHfz65L4BLZRPMbxmNFrD3nmJFrHs-SzQh83kM0RJzlFosRw","is_licensed":true,"is_hq":true,"track_genre_id":14,"access_key":"2d337b59fba1d48289"},{"id":456411330,"owner_id":371745438,"artist":"Gorillaz feat. Rag'n'Bone Man, Zebra Katz, RAY BLK","title":"The Apprentice (feat. Rag'n'Bone Man, Zebra Katz & RAY BLK)","duration":234,"date":1501738356,"url":"https:\/\/cs1-80v4.vkuseraudio.net\/p4\/465f2805d046a4.mp3?extra=_BN4K4tfimxpz7-O8yl9ooPzeooI0vu_LCEBqF71-gRkpRqSM1kl_Nh3jYECVVb6ERGiYzxuU42zkBzB22T-5ZPkd2tjLjn5EEb2wokTj5wcwqz62tjOeQ0NX11eIK54PqubxwKWsls-_e4cdCTIIL3enw","is_licensed":true,"is_hq":true,"track_genre_id":14,"access_key":"759256083b07a4f6ff"}]
```


- ?**download**=**url**  - for download, url from search response
&**artist**=**something**  - for set artist
&**title**=**something**  - for set title
  `  http://yousite.com/music?download=https://cs1-44v4.vkuseraudio.net/p18/4f4efbc45ca53f.mp3?extra=DQEeJ36Xxs5BB9jGNKcskKkZVRlwvqLW8rcS9xA6pADCQJG_-_2Eb5USJByrWQE98-YAui4Kn-5M1isFyLdeDbcP5My2RDxkhjRA08eZvvMHfz65L4BLZRPMbxmNFrD3nmJFrHs-SzQh83kM0RJzlFosRw&artist=Gorillaz&title=Feel%20Good%20Inc`  for download something with new metadata

u can change implementation as u want and use as u want


## get vk token
get **kate mobile** token (or many) from https://github.com/vodka2/vk-audio-token

only need email (or tel) and password, doesn't need revoke


### small info

 - user-agent and token need for search, doesn't need for download
 - id3 tags is used to set artist and title in telegram inline search 
 - first echo id3 tag, next get music streamly from vk (no need to wait for full download)
 - maybe captcha
 - by svinerus, used in kpi_radio_bot repo
 - named because of awesome bitrate VK music
 - waiting for pull requests
