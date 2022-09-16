(define (RC r c dt)
   (lambda (si initial-voltage)
     (add-streams (scale-stream si r)
     (integral (scale-stream si (/ 1 c)) initial-voltage dt))))
