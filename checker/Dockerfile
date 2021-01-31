FROM hexletbasics/base-image

RUN curl -o racket.sh \
    https://mirror.racket-lang.org/installers/7.8/racket-7.8-x86_64-linux.sh && \
    sh racket.sh --unix-style && \
    rm racket.sh
RUN raco pkg install \
    --scope installation --batch \
    --no-docs --no-cache --no-trash \
    rackunit \
    review

WORKDIR /exercise

CMD ["raco", "test", "solution.rkt"]
