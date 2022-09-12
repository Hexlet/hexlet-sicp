 (define (invert-unit-series series)
   (define inverted-unit-series
     (cons-stream 1 (scale-stream (mul-streams (stream-cdr series)
                                               inverted-unit-series)
                                  -1)))
   inverted-unit-series)
