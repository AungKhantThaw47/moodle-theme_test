FROM bitnami/moodle:3.11.7
LABEL maintainer "Bitnami <containers@bitnami.com>"
RUN install_packages git
RUN install_packages curl
COPY ./akt /akt
COPY entrypoint.sh /opt/bitnami/scripts/moodle/