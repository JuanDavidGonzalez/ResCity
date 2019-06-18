from pyspark import SparkContext
from pyspark.streaming import StreamingContext
from pyspark.streaming.kafka import KafkaUtils
import json
from kafka import SimpleProducer, KafkaClient
from kafka import KafkaProducer
import datetime
from time import gmtime, strftime
producer = KafkaProducer(bootstrap_servers='10.96.160.223:9092')

def send_to_kafka(message):
        records = message.collect()
        date = strftime("%Y-%m-%d %H:%M:%S", gmtime())

        for record in records:
                msn = str(record).replace('(u\'', "")
                msn = msn.replace(')', "").replace("\'", "").rsplit(", ")
                msn.append(date)
                msn = ','.join(msn)
                producer.send('tweets_spark_out', msn)
                producer.flush()

def main():

        # Create Spark context
        sc = SparkContext(appName="TweetCountHashTag")
        sc.setLogLevel("WARN")

        # Create Streaming Context
        ssc = StreamingContext(sc, 120)

        # Connect to Kafka
        dataStream = KafkaUtils.createStream(ssc, '10.111.144.247:2181', 'spark-streaming', {'tweets':1})

        full_tweet = dataStream.map(lambda v: json.loads(v[1]))
        words = full_tweet.flatMap(lambda tweet:tweet['text'].split(" "))

        hashtags = words.filter(lambda w: w =='#Venezuela' or w =='#Colombia')
        counts = hashtags.map(lambda word: (word, 1)).reduceByKey(lambda a, b: a + b)
        counts.pprint()
        counts.foreachRDD(send_to_kafka)

        # Start the streaming context
        ssc.start()
        ssc.awaitTermination()

if __name__ == "__main__":

      main()
