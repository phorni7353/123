urls = ["http://www.google.com/a.txt",    
        "http://www.google.com.tw/a.txt",    
        "http://www.google.com/download/c.jpg",     
        "http://www.google.co.jp/a.txt",     
        "http://www.google.com/b.txt",     
        "https://facebook.com/movie/b.txt",    
        "http://yahoo.com/123/000/c.jpg",     
        "http://gliacloud.com/haha.png", ] 


filenames = [""]

for i in range(0, len(urls) ):
    filenames.append ( urls[i].rsplit("/",1)[-1] )

from collections import Counter
word_counts = Counter(filenames)
top_three = word_counts.most_common(3)

print(top_three) 