FROM bitnami/moodle
RUN echo "es_ES.UTF-8 UTF-8" >> /etc/locale.gen && locale-gen
