# Remove after TYPO3 13.2 when all fields are being auto-created

CREATE TABLE tx_chfpub_domain_model_essay (
    title varchar(255) DEFAULT '' NOT NULL,
    importOrigin varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_chfpub_domain_model_volume (
    title varchar(255) DEFAULT '' NOT NULL,
    importOrigin varchar(255) DEFAULT '' NOT NULL
);

CREATE TABLE tx_chfbase_domain_model_relation (
    position varchar(255) DEFAULT '' NOT NULL
);
