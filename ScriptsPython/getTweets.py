from tweepy.streaming import StreamListener
from tweepy import OAuthHandler
from tweepy import Stream
from kafka import SimpleProducer, KafkaClient

access_token = "XXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
access_token_secret =  "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"
consumer_key =  "xxxxxxxxxxxxxxxxxxxxxxxxxxxx""
consumer_secret =  "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"

class StdOutListener(StreamListener):
    def on_data(self, data):
        producer.send_messages("tweets", data.encode('utf-8'))
        return True
    def on_error(self, status):
        print (status)

kafka = KafkaClient("10.96.160.223:9092")
producer = SimpleProducer(kafka)
l = StdOutListener()
auth = OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)

print("Obteniendo Tweets...")
stream = Stream(auth, l)
stream.filter(track=["#Colombia", "#Venezuela"]);
